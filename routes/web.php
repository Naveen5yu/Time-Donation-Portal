<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TimeRequestController;
use App\Http\Controllers\Donor\DonorController as DonorDashboardController;
use App\Http\Controllers\Seeker\SeekerController as SeekerDashboardController;

// Auth
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboards
Route::get('/admin/dashboard', fn() => view('dashboards.admin'))->name('admin.dashboard');

// Seeker routes
Route::prefix('seeker')->middleware('auth')->group(function () {
    Route::get('/dashboard', [SeekerDashboardController::class, 'dashboard'])->name('seeker.dashboard');
    Route::get('time-requests', [SeekerDashboardController::class, 'timeRequests'])->name('seeker.time_requests.index');
    Route::get('time-requests/create', [SeekerDashboardController::class, 'createTimeRequest'])->name('seeker.time_requests.create');
    Route::post('time-requests', [SeekerDashboardController::class, 'storeTimeRequest'])->name('seeker.time_requests.store');
    Route::get('donors', [SeekerDashboardController::class, 'donorsList'])->name('seeker.donors.index');
    Route::get('donors/{id}', [SeekerDashboardController::class, 'showDonor'])->name('seeker.donors.show');
    Route::get('chat', [SeekerDashboardController::class, 'chat'])->name('seeker.chat');
});

// Donor routes
Route::prefix('donor')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DonorDashboardController::class, 'dashboard'])->name('donor.dashboard');
    Route::get('/my-donations', [DonorDashboardController::class, 'myDonations'])->name('donor.my_donations');
    Route::get('/seeker-requests', [DonorDashboardController::class, 'seekerRequests'])->name('donor.seeker_requests');
    Route::get('/chat', [DonorDashboardController::class, 'chat'])->name('donor.chat');
});


Route::get('/', function () {
    return view('welcome');  // This points to resources/views/welcome.blade.php
})->name('welcome');
