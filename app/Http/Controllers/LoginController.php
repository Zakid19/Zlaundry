<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function login()
    {
        return view('auth.logins.login');
    }

    public function store(Request $request)
    {
       $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($attributes)) {
            return redirect('dashboard')->with('success', 'Anda berhasil login');
        }

        throw ValidationException::withMessages([
            'email' => 'Email Anda tidak sesuai dengan password'
        ]);

    }
}
