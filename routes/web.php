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

Route::controller(HomeController::class)->group(function () {
    Route::get('/',  'index')->name('home');
    Route::get('/post/{post}',  'post')->name('home.post');
    Route::get('/about',  'about')->name('home.about');
    Route::get('/contact',  'contact')->name('home.contact');
});
