<?php

namespace App\Http\Controllers;

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

    public function addLessons(request $request){
        // dd($request->all());
        $validated = $request->validate([
            'lesson' => 'required'
        ]);

        Lesson::create([
            'level_id' => $request->lvl_lessons,
            'words' => $request->lesson
        ]);

        return back();
    }
}
