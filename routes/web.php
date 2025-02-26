<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\User\UserController;

require __DIR__ . '/admin.php';
require __DIR__ . '/user.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register',[AuthenticationController::class, 'signUp'])->name('signUp');
Route::post('/signin',[AuthenticationController::class, 'signIn'])->name('signIn');
Route::post('/signout',[AuthenticationController::class, 'signOut'])->name('signOut');

Route::get('profile',[UserController::class, 'profile'])->name('profile')->middleware('auth');
