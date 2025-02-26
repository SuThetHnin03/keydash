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
    Route::get('/challenge/page', [UserController::class, 'userChallengePage'])->name('userChallenge');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/leaderboard/page',[UserController::class, 'userLeaderboardPage'])->name('userLeaderboard');
    Route::get('/profile/{id}/page', [UserController::class, 'friendProfile'])->name('friendProfile');
    Route::post('add',[UserController::class, 'add'])->name('add');
    Route::post('remove',[UserController::class, 'remove'])->name('remove');

    Route::post('/save-level-track', [LessonController::class, 'store'])->name('storeData');
    Route::post('/save-level-achievement', [LessonController::class, 'storeAchievement'])->name('storeAchievement');
    Route::post('/store/exps', [LessonController::class, 'storeExps'])->name('storeExps');
    Route::post('/add-connection', [UserController::class, 'addConnection'])->name('addConnection');




});
