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

// CRUD Books (Otomatis mencakup index, create, store, show, edit, update, destroy)
Route::resource('books', BookController::class);

// Categories
Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

// Members
Route::get('/members', [MemberController::class, 'index'])
    ->name('members.index');