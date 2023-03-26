<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssestAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('assest.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('assest')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('assest.dashboard');
        }

        return redirect()->back()->withErrors(['username' => 'Invalid username or password.']);
    }

}
