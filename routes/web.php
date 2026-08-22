<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Routing\RouteDependencyResolverTrait;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function() {
    return view('home');
});

//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');

//logout
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

//register
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//dashboard
Route::get('/dashboard', function(){return view('dashboard');})->middleware('auth')->name('dashboard');