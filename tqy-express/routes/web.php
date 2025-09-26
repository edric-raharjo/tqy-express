<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

// Guests only
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

// Authenticated only
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Example dashboards by role        
    Route::middleware(RoleMiddleware::class.':admin')->get('/dashboard/admin', fn () => view('dashboard.admin'))->name('dashboard.admin');
    Route::middleware(RoleMiddleware::class.':kurir')->get('/dashboard/courier', fn () => view('dashboard.courier'))->name('dashboard.courier');
    Route::middleware(RoleMiddleware::class.':staff')->get('/dashboard/staff', fn () => view('dashboard.staff'))->name('dashboard.staff');

    // Generic catch-all (if needed)
    Route::get('/dashboard', fn () => view('dashboard.index'))->name('dashboard.index');
});

