<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show login page
    public function showLogin()
    {
        return view('auth.login');
    }

    // Handle login (username or email + password)
    public function login(Request $request)
    {
        $data = $request->validate([
            'login'    => ['required','string'], // username or email
            'password' => ['required','string','min:6'],
        ]);

        $login = $data['login'];
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $field     => $login,
            'password' => $data['password'],
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Role-based redirect
            $user = Auth::user();
            return match ($user->role) {
                'admin'  => redirect()->intended('/dashboard/admin'),
                'kurir'  => redirect()->intended('/dashboard/courier'),
                'staff'  => redirect()->intended('/dashboard/staff'),
                default  => redirect()->intended('/dashboard'),
            };
        }

        return back()
            ->withErrors(['/login' => 'Credentials not recognized.'])
            ->onlyInput('/login');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
