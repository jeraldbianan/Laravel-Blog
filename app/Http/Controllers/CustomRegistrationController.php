<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomRegistrationController extends Controller {

    public function customRegister(Request $request) {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $firstname = ucfirst($request->firstname);
        $lastname = ucfirst($request->lastname);

        $user = User::create([
            'name' => "{$firstname} {$lastname}",
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Auth::login($user);

        return redirect()->route('admin.index');
    }
}
