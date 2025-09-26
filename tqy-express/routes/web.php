<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
    // need to customize home page
});

// Guests only
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

// Authenticated only
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // All roles can view their profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


Route::middleware(['auth', 'role'.'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn () => view('dashboard.admin'))->name('dashboard');
    Route::resource('/users', Admin\UserController::class);
    // names: admin.users.index, admin.users.create, admin.users.store, etc.
});

Route::middleware(['auth', 'role:hub'])->prefix('hub')->name('hub.')->group(function () {
    Route::get('/dashboard', [HubDashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'role:courier'])->prefix('courier')->name('courier.')->group(function () {
    Route::get('/dashboard', [CourierDashboardController::class, 'index'])->name('dashboard');

    // Two extra pages:
    Route::get('/packets', [CourierPacketController::class, 'index'])->name('packets.index'); // list packets
    Route::post('/packets/{packet}/confirm', [CourierPacketController::class, 'confirm'])
        ->name('packets.confirm'); // upload photo, mark delivered
});
