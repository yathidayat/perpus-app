<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
     // Menampilkan halaman daftar
    public function index()
    {
        return view('register'); 
    }
 
    // Memproses pendaftaran
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'     => ['required', 'string', 'max:150'],
            'no_induk' => ['required', 'string', 'max:30', 'unique:users,no_induk'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // cocok dg password_confirmation
            'terms'    => ['accepted'],
        ]);
 
        $user = User::create([
            'role_id'  => null,
            'nama'     => $validated['nama'],
            'password' => Hash::make($validated['password']),
            'no_induk' => $validated['no_induk'],
            'status'   => 'aktif',
        ]);
 
        Auth::login($user);
 
        return redirect()->intended('/login');
    }
}
