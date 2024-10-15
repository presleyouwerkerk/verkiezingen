<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ElectionTypeController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/election-types', [ElectionTypeController::class, 'index'])->name('election_types.index');
    

    Route::middleware(['ministry'])->group(function () {
        Route::get('/election-types/create', [ElectionTypeController::class, 'create'])->name('election_types.create'); 
        Route::post('/election-types', [ElectionTypeController::class, 'store'])->name('election_types.store');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';