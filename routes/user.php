<?php
use App\Models\Lessson;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\LessonController;

Route::group(["prefix" => 'user', 'middleware' => 'user'], function () {
    Route::get('/home/page', [UserController::class, 'userHomePage'])->name('userHome');
    Route::get('/lessons/page', [UserController::class, 'userLessonsPage'])->name('userLessons');
    Route::get('/lesson/{id}/page', [UserController::class, 'userLessonPage'])->name('userLesson');
    Route::get('/challenges/page',[UserController::class, 'userChallengesPage'])->name('userChallenges');
    Route::get('/challenge/page', [UserController::class, 'userChallengePage'])->name('userChallenge');

    Route::post('/save-level-track', [LessonController::class, 'store'])->name('storeData');




});
