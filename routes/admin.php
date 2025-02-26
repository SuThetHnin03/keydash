<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::group(["prefix" => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('add/lessons/page',[AdminController::class, 'redirectAddLessons'])->name('redirectAddLessons');

    Route::post('add/lessons', [AdminController::class, 'addLessons'])->name('addLessons');
});
