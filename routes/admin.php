<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::group(["prefix" => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard/page',[AdminController::class, 'redirectDashboard'])->name('redirectDashboard');
    Route::get('add/lessons/page',[AdminController::class, 'redirectAddLessons'])->name('redirectAddLessons');
    Route::get('add/challenges/page',[AdminController::class, 'redirectAddChallenges'])->name('redirectAddChallenges');

    Route::post('add/lessons', [AdminController::class, 'addLessons'])->name('addLessons');
    Route::post('add/challenges', [AdminController::class, 'addChallenges'])->name('addChallenges');
});
