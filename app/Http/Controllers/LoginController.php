<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credential = $request->validate([
          'no_induk' => ['required'],
          'password' => ['required']
        ]);

        if(Auth::attempt($credential, $request->boolean('remember'))){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'no_induk' => 'NIS/NIP atau kata sandi salah.'
        ])->onlyInput('no_induk');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}