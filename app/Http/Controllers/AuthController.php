<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showClientLogin()
    {
        if (Auth::check()) {
            return redirect()->route('client.dashboard');
        }

        return view('Client.loginClient');
    }

    public function loginClient(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (!Auth::attempt($credentials, $remember)) {
            return back()
                ->withErrors(['email' => 'Email ou mot de passe incorrect.'])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        if (Auth::user()->status === 'Suspended') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return back()
                ->withErrors(['email' => 'Votre compte est suspendu.'])
                ->onlyInput('email');
        }

        return redirect()->intended(route('client.dashboard'));
    }

    public function dashboard()
    {
        return view('Client.dashboard');
    }

    public function logoutClient(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('client.login');
    }
}
