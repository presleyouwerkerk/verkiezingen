<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ElectionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

Route::view('/', 'welcome');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::view('panel', 'admin.admin_panel')->name('admin_panel');
    Route::resource('elections', ElectionController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'partijbeheerder'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    Route::post('/users/{id}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRole');
});

require __DIR__ . '/auth.php';