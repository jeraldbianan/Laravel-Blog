<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller {

    public function __construct() {
        $this->middleware('custom-guest')->except('customLogout');
    }

    public function customShowLoginForm() {
        return view('custom-login');
    }

    public function customLogin(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->route('posts.index');
        }

        return redirect()->route('custom.login');
    }

    public function customLogout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('custom.login');
    }
}
