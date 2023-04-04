<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('doctor.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('doctor')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('doctor.dashboard');
        }

        return redirect()->back()->withErrors(['username' => 'Invalid username or password.']);
    }
    public function logout(Request $request)
    {
        Auth::guard('doctor')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/doctor');
    }


}
