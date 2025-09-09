<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return Inertia::render('home');
    })->name('home');
});

Route::middleware('notguest')->group(function () {

    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'page')->name('register');
        Route::post('/api/register', 'auth');
    });

    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'page')->name('login');
        Route::post('/api/login', 'auth');
    });
});
Route::get('/logout', [LoginController::class, 'logout']);
