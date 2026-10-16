<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

// CRUD Books
Route::resource('books', BookController::class);

// CRUD Categories
Route::resource('categories', CategoryController::class);

// CRUD Members
Route::resource('members', MemberController::class);