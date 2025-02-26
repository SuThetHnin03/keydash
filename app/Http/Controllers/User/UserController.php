<?php

namespace App\Http\Controllers\User;

use App\Models\exp;
use App\Models\User;
use App\Models\Lesson;
use App\Models\friends;
use App\Models\Chllenges;
use Illuminate\Http\Request;
use App\Models\level_achievement;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function userHomePage()
    {
        $users = $this->leaderboardList();
        $exps = $this->analysis();
        $best = $this->highestScore();
        return view('user.home', compact('best', 'exps', 'users'));
    }

    public function userLessonsPage()
    {
        $best = $this->highestScore();
        return view('user.lessons', compact('best'));
    }

    public function userLessonPage($id)
    {
        $lesson = Lesson::get()->where('level_id', $id);
        // dd($lesson);
        return view('user.lesson', compact('lesson'));
    }

    public function profile()
    {
        $user = Auth::user();
        $exps = $this->analysis();
        $best = $this->highestScore();
        return view('profile', compact('user', 'best', 'exps'));
    }

    public function updateProfile(Request $request)
    {

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();

        // Check if the user is authenticated
        if (!$user) {
            return back()->withErrors(['error' => 'User not authenticated']);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/profile_images'), $filename);

            if ($user->image) {
                $oldImagePath = public_path('uploads/profile_images/' . $user->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $user->profile = $filename;
        }

        // Update the user's details
        $user->name = $request->name;

        // Save the user using update() (this is fine if $user is an Eloquent instance)
        $user->save();

        return back();
    }


    public function friendProfile($id)
    {
        $user = User::leftJoin('exps', 'users.id', '=', 'exps.user_id')
            ->select(
                'users.*',
                DB::raw('(SELECT SUM(total_exp) FROM exps WHERE exps.user_id = users.id) as total_exp')
            )
            ->where('users.role', 'user')
            ->groupBy(
                'users.id',
                'users.user_code',
                'users.name',
                'users.email',
                'users.profile',
                'users.email_verified_at',
                'users.password',
                'users.role',
                'users.remember_token',
                'users.created_at',
                'users.updated_at'
            )
            ->orderByDesc('total_exp')
            ->where('users.id', $id)
            ->first();

        if (!$user) {
            return abort(404, 'User not found');
        }

        $exps = exp::where('user_id', $id)
            ->selectRaw('SUM(CAST(total_exp AS DECIMAL)) as total_exp_sum')
            ->value('total_exp_sum');

        return view('profile', compact('user', 'exps'));
    }

    public function addConnection(Request $request)
    {
        $userId = $request->to_id; // Get the user ID from the request
        $loggedInUser = auth()->user(); // Get the logged-in user

        // Check if the reverse connection exists (e.g., if 2 and 1 exists, don't add 1 and 2)
        $existingConnection = DB::table('friends')
            ->where(function ($query) use ($loggedInUser, $userId) {
                // Check for existing connection where from_id = 1 and to_id = 2 OR from_id = 2 and to_id = 1
                $query->where('from_id', $loggedInUser->id)
                    ->where('to_id', $userId);
            })
            ->orWhere(function ($query) use ($loggedInUser, $userId) {
                $query->where('from_id', $userId)
                    ->where('to_id', $loggedInUser->id);
            })
            ->exists(); // Check if the connection already exists

        if (!$existingConnection) {
            // Add the new connection if it doesn't already exist
            DB::table('friends')->insert([
                'from_id' => $loggedInUser->id,
                'to_id' => $userId,
            ]);
        }

        return back();  // Redirect back to the profile page
    }

    public function userLeaderboardPage()
    {
        $users = $this->leaderboardList();
        return view('user.leaderboard', compact('users'));
    }

    public function add(Request $request)
    {
        $friendRequest = friends::findOrFail($request->id);

        $friendRequest->status = 1;
        $friendRequest->save();

        return response()->json(['message' => 'Friend request accepted successfully.']);
    }

    public function remove(Request $request) {
        $friendRequest = friends::findOrFail($request->id);

        $friendRequest->status = 2;
        $friendRequest->save();

        return response()->json(['message' => 'Friend request accepted successfully.']);
    }

    private function highestScore()
    {
        $records = level_achievement::where('user_id', Auth::user()->id)->get();


        // Constants for calculation
        $max_wpm = 100;
        $max_duration = 60; // seconds
        $w_wpm = 0.4;
        $w_accuracy = 0.4;
        $w_duration = 0.1;
        $w_typos = 0.1;

        $best = null;  // Variable to hold the best record
        $max_score = -INF;  // Start with the lowest possible value

        foreach ($records as $record) {
            // Convert duration (format: "00:09") to seconds
            [$minutes, $seconds] = explode(':', $record->duration);
            $duration_in_seconds = ((int)$minutes * 60) + (int)$seconds;

            // Cast necessary fields
            $wpm = (float)$record->wpm;
            $accuracy = (float)$record->accuracy;
            $typos = (int)$record->typos;
            $total_words = (int)$record->total_words;

            // Prevent division by zero
            $total_words = $total_words > 0 ? $total_words : 1;

            // Normalize and calculate scores
            $wpm_score = ($wpm / $max_wpm) * 100;
            $accuracy_score = $accuracy;
            $duration_score = (($max_duration - $duration_in_seconds) / $max_duration) * 100;
            $typo_score = ((($total_words - $typos) / $total_words) * 100);

            // Final weighted score
            $final_score = ($wpm_score * $w_wpm) +
                ($accuracy_score * $w_accuracy) +
                ($duration_score * $w_duration) +
                ($typo_score * $w_typos);

            // Check if this score is the highest
            if ($final_score > $max_score) {
                $max_score = $final_score;
                $best = $record;
            }
        }

        return $best;
    }

    private function analysis()
    {
        $exps = exp::where('user_id', auth()->user()->id)
            ->selectRaw('SUM(CAST(total_exp AS DECIMAL)) as total_exp_sum')
            ->value('total_exp_sum');


        $exps = $exps ?? 0;
        return $exps;
    }

    private function leaderboardList()
    {
        $users = User::leftJoin('exps', 'users.id', '=', 'exps.user_id')
            ->select(
                'users.*',
                'exps.user_id',
                DB::raw('(SELECT SUM(total_exp) FROM exps WHERE exps.user_id = users.id) as total_exp')
            )
            ->where('users.role', 'user')
            ->groupBy('exps.user_id', 'users.user_code', 'users.name', 'users.email', 'users.profile', 'users.email_verified_at', 'users.password', 'users.role', 'users.remember_token', 'users.created_at', 'users.updated_at', 'users.id')
            ->orderByDesc('total_exp')
            ->get();
        return $users;
    }
}
