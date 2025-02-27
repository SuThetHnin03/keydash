<?php

namespace App\Http\Controllers\User;

use Monolog\Level;
use App\Models\exp;
use App\Models\lesson;
use App\Models\Level_track;
use Illuminate\Http\Request;
use App\Models\level_achievement;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
    public function store(Request $request)
    {
        // Check if a record already exists with the same user_id and lesson_id
        $existingTrack = level_track::where('user_id', $request->user_id)
            ->where('lesson_id', $request->lesson_id)
            ->first();

        if ($existingTrack) {
            // Update the existing record
            $existingTrack->update([
                'user_id' => $request->user_id,
                'lesson_id' => $request->lesson_id,
            ]);

            return response()->json(['message' => 'Record updated successfully.']);
        }

        // If no record exists, create a new one
        level_track::create([
            'user_id' => $request->user_id,
            'lesson_id' => $request->lesson_id,
        ]);

        return response()->json(['success' => true]);
    }


    public function storeAchievement(Request $request)
    {
        // Check if a record already exists with the same user_id and lesson_id
        $existingAchievement = level_achievement::where('user_id', $request->user_id)
            ->where('lesson_id', $request->lesson_id)
            ->first();

        if ($existingAchievement) {
            // Update the existing record
            $existingAchievement->update([
                'wpm' => $request->wpm,
                'duration' => $request->duration,
                'accuracy' => $request->accuracy,
                'typos' => $request->typos,
                'total_words' => $request->total_words,
            ]);

            return response()->json(['message' => 'Achievement updated successfully.']);
        }


        // If no record exists, create a new one
        level_achievement::create([
            'user_id' => $request->user_id,
            'lesson_id' => $request->lesson_id,
            'wpm' => $request->wpm,
            'duration' => $request->duration,
            'accuracy' => $request->accuracy,
            'typos' => $request->typos,
            'total_words' => $request->total_words,
        ]);

        return response()->json(['success' => true]);
    }


    public function storeLevelTrack(Request $request)
    {
        // Check if a record already exists with the same user_id and lesson_id
        $existingAchievement = Level_track::where('user_id', $request->user_id)
            ->where('lesson_id', $request->lesson_id)
            ->first();

        // If no record exists, create a new one
        if (!$existingAchievement) {
            Level_track::create([
                'user_id' => $request->user_id,
                'lesson_id' => $request->lesson_id,
            ]);
        }

        return response()->json(['success' => true]);
    }

    public function storeExps(Request $request)
    {
        exp::create([
            'user_id' => $request->user_id,
            'total_exp' => $request->total_exp,
        ]);

        return response()->json(['success' => true]);
    }
}
