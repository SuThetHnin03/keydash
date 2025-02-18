<?php

namespace App\Http\Controllers\User;

use Monolog\Level;
use App\Models\lessson;
use App\Models\Level_track;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'lesson_id' => 'required|exists:lesssons,id',
            'user_id' => 'required|exists:users,id',
        ]);

        level_track::create([
            'user_id' => $validated['user_id'],
            'level_id' => $validated['lesson_id'],
        ]);

        // // Save to the level_tracks table
        // $levelTrack = new LevelTrack();
        // $levelTrack->lesson_id = $validated['lesson_id'];
        // $levelTrack->user_id = $validated['user_id'];
        // $levelTrack->save();

        return response()->json(['success' => true]);
    }



}
