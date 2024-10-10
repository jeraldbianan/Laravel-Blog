<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::resource('posts', PostController::class);
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/post/{post}', [HomeController::class, 'show'])->name('home.post');
