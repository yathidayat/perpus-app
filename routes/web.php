<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RolesController;
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
Route::get('/dashboard', function(){return view('page/dashboard');})->middleware('auth')->name('dashboard');

//page menu
Route::get('/menu', [MenuController::class, 'index'])->name('menu_index');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');

//page roles
Route::get('/roles', [RolesController::class, 'index'])->name('roles');
Route::post('/roles', [RolesController::class, 'store'])->name('role.store');