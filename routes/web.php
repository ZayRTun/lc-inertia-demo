<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Home');
    })->name('home');

    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/create', [UserController::class, 'create']);
    Route::put('/users/{user}', [UserController::class, 'update']);
    Route::get('/users/{user}/edit', [UserController::class, 'edit']);

    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });
});
