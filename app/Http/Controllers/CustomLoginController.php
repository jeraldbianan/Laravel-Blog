<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomLoginController extends Controller {
    public function customShowLoginForm() {

        return view('custom-login');
    }
}
