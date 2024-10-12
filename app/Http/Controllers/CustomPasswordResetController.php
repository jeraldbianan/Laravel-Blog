<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class CustomPasswordResetController extends Controller {
    public function __construct() {
        $this->middleware('custom-guest');
    }

    public function customPasswordResetLinkForm() {
        return view('custom-password-reset-link-form');
    }

    public function customPasswordResetSendLink(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with(['status' => __($status)]);
        } else {
            return back()->withErrors(['email' => __($status)]);
        }
    }

    public function customPasswordResetForm(Request $request, $token) {
        $email = $request->query('email');
        return view('custom-password-reset-form', [
            'email' => $email,
            'token' => $token
        ]);
    }

    public function customPasswordReset(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $status = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function (User $user, $password) {
            $user->forceFill([
                'password' => Hash::make($password),
            ])->setRememberToken(Str::random(40));

            $user->save();
        });

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('custom.login')->with(['status' => __($status)]);
        } else {
            return back()->with(['error' => __($status)]);
        }
    }
}
