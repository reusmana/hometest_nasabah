<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserControllers extends Controller
{
    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->hasRole('supervisor')) {
                return redirect()->route('supervisor.home');
            } elseif ($user->hasRole('customer service')) {
                return redirect()->route('cs.home');
            }
        }

        return redirect()->back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ])->withInput();
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('/');
    }
}
