<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider {
    /**
     * Register services.
     */
    public function register(): void {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {
        ResetPassword::createUrlUsing(function (User $user, $token) {
            return "http://127.0.0.1:8000/custom-password-reset/{$token}?email={$user->email}";
        });
    }
}
