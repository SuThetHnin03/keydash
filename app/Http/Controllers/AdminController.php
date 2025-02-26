<?php

namespace App\Http\Controllers;
use App\Models\lesson;
use App\Models\Chllenges;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
     //
     public function redirectDashboard(){
        return view('admin.dashboard');
    }

    public function redirectAddLessons(){
        return view('admin.lessons');
    }

    public function redirectAddChallenges(){
        return view('admin.challenges');
    }

    public function addLessons(request $request){
        // dd($request->all());
        $validated = $request->validate([
            'lesson' => 'required'
        ]);

        Lesson::create([
            'level_id' => $request->lvl_lessons,
            'lesson' => $request->lesson
        ]);

        return back();
    }

    public function addChallenges(request $request){
        // dd($request->all());
        $validated = $request->validate([
            'challenges' => 'required',
            'exp' => 'required',
            'time' => 'required'
        ]);

        Chllenges::create([
            'challenges' => $validated['challenges'],
            'exp' => $validated['exp'],
            'time' => $validated['time']
        ]);

        return back();
    }
}
