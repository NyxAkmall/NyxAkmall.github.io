<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LOGIN PAGE
    |--------------------------------------------------------------------------
    */

    public function login()
    {
        return view('auth.login');
    }

    /*
    |--------------------------------------------------------------------------
    | REGISTER PAGE
    |--------------------------------------------------------------------------
    */

    public function register()
    {
        return view('auth.register');
    }

    /*
    |--------------------------------------------------------------------------
    | PROCESS REGISTER
    |--------------------------------------------------------------------------
    */

    public function processRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login')
            ->with('success', 'Register berhasil');
    }

    /*
    |--------------------------------------------------------------------------
    | PROCESS LOGIN
    |--------------------------------------------------------------------------
    */

    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            if (Auth::user()->role == 'admin') {
                return redirect('/dashboard');
            }

            return redirect('/pemilahan');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}