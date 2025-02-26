<?php

namespace App\Http\Controllers;
use App\Models\lesson;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function redirectAddLessons(){
        return view('admin.lessons');
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
}
