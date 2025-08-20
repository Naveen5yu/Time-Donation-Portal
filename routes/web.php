<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboards
Route::get('/admin/dashboard', function () { return "Admin Dashboard"; })->name('admin.dashboard');
Route::get('/donor/dashboard', function () { return "Donor Dashboard"; })->name('donor.dashboard');
Route::get('/seeker/dashboard', function () { return "Seeker Dashboard"; })->name('seeker.dashboard');
