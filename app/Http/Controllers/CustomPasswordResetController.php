<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomPasswordResetController extends Controller {
    public function __construct() {
        $this->middleware('custom-guest');
    }

    public function customPasswordResetForm() {
        return view('custom-password-reset-form');
    }

    public function customPasswordReset(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ]);
    }
}
