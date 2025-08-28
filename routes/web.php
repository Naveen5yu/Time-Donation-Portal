<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TimeRequestController;
use App\Http\Controllers\Donor\DonorController as DonorDashboardController;
use App\Http\Controllers\Seeker\SeekerController as SeekerDashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Seeker routes
Route::prefix('seeker')->middleware('auth')->group(function () {
    Route::get('/dashboard', [SeekerDashboardController::class, 'dashboard'])->name('seeker.dashboard');
    Route::get('time-requests', [SeekerDashboardController::class, 'timeRequests'])->name('seeker.time_requests.index');
    Route::get('time-requests/create', [SeekerDashboardController::class, 'createTimeRequest'])->name('seeker.time_requests.create');
    Route::post('time-requests', [SeekerDashboardController::class, 'storeTimeRequest'])->name('seeker.time_requests.store');
    Route::get('donors', [SeekerDashboardController::class, 'donorsList'])->name('seeker.donors.index');
    Route::get('donors/{id}', [SeekerDashboardController::class, 'showDonor'])->name('seeker.donors.show');

    // Seeker chat (with donor)
    Route::get('chat/{timeRequest}', [SeekerDashboardController::class, 'chat'])->name('seeker.chat');
});

// Donor routes
Route::prefix('donor')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DonorDashboardController::class, 'dashboard'])->name('donor.dashboard');
    Route::get('/my-donations', [DonorDashboardController::class, 'myDonations'])->name('donor.my_donations');
    Route::get('/seeker-requests', [DonorDashboardController::class, 'seekerRequests'])->name('donor.seeker_requests');
    Route::post('/accept-request/{id}', [DonorDashboardController::class, 'acceptRequest'])->name('donor.accept_request');
    Route::post('/reject-request/{id}', [DonorDashboardController::class, 'rejectRequest'])->name('donor.reject_request');

    // Donor chat (with seeker)
    Route::get('/chat/{timeRequest}', [DonorDashboardController::class, 'chat'])->name('donor.chat');
});

// Chat API routes (shared by both roles)
Route::middleware('auth')->group(function () {
    Route::get('/chat/{timeRequest}/fetch', [ChatController::class, 'fetch'])->name('chat.fetch');
    Route::post('/chat/{timeRequest}/send', [ChatController::class, 'send'])->name('chat.send');
    Route::post('/chat/mark-read/{timeRequest}', [ChatController::class, 'markAsRead'])->name('chat.mark_read');
    Route::get('/chats', [ChatController::class, 'getChats'])->name('chat.list');
});

// Default welcome page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Admin routes
Route::prefix('admin')->middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // User Management CRUD
    Route::get('/users', [AdminController::class, 'usersIndex'])->name('admin.users.index');
    Route::get('/users/create', [AdminController::class, 'usersCreate'])->name('admin.users.create');
    Route::post('/users', [AdminController::class, 'usersStore'])->name('admin.users.store');
    Route::get('/users/{id}/edit', [AdminController::class, 'usersEdit'])->name('admin.users.edit');
    Route::put('/users/{id}', [AdminController::class, 'usersUpdate'])->name('admin.users.update');
    Route::delete('/users/{id}', [AdminController::class, 'usersDelete'])->name('admin.users.delete');

    // Reports
    Route::get('/reports', [AdminController::class, 'reportsIndex'])->name('admin.reports.index');
    Route::get('/reports/{id}', [AdminController::class, 'reportsShow'])->name('admin.reports.show');
    Route::get('/reports/exportPDF', [AdminController::class, 'reportsExportPDF'])->name('admin.reports.exportPDF');
});

?>