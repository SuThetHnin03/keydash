<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lessson;

class UserController extends Controller
{
    //
    public function userHomePage() {
        return view('user.home');
    }

    public function userLessonsPage() {
        return view('user.lessons');
    }

    public function userLessonPage($id) {
        $lesson = Lessson::get()->where('level_id', $id);
        // dd($lesson);
        return view('user.lesson',compact('lesson'));
    }

    public function userChallengesPage() {
        return view('user.challenges');
    }

    public function userChallengePage() {
        return view('user.challenge');
    }
}
