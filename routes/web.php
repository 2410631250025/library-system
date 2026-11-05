<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// Route Guest (login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.submit');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Fitur yang boleh diakses admin dan petugas    
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('books', BookController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('members', MemberController::class);
});

Route::middleware(['auth', 'can:manage-user'])->group(function () {
    // Route::resource('users', UserController::class);

    Route::get('/users', function () {
        return "Halo";
    });
});

Route::get('users', [UserController::class, 'index'])
    ->middleware(['auth', 'can:manage-user'])
    ->name('users.index');

// Hanya admin yang boleh mengelola akun pengguna
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
});    
    