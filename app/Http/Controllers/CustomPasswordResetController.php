<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

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
        ]);
    }
}
