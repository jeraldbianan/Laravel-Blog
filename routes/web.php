<?php

use App\Http\Controllers\CustomLoginController;
use App\Http\Controllers\CustomPasswordResetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware(['custom-auth'])->prefix('admin')->group(function () {
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

Route::controller(CustomLoginController::class)->group(function () {
    Route::get('/custom-login',  'customShowLoginForm')->name('custom.login');
    Route::post('/custom-login',  'customLogin')->name('custom.login.post');
    Route::post('/custom-logout',  'customLogout')->name('custom.logout');
});

Route::controller(CustomPasswordResetController::class)->group(function () {
    Route::get('/custom-password-reset-form',  'customPasswordResetForm')->name('custom.password.reset.form');
    Route::post('/custom-password-reset',  'customPasswordReset')->name('custom.password.reset');
});
