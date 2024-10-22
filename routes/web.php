<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ministry\ElectionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Ministry\PartymanagerController;
use App\Http\Controllers\Partymanager\PartyController;
use App\Http\Controllers\Partymanager\CandidateController;

Route::view('/', 'welcome');

Route::get('dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'ministry'])->prefix('ministry')->as('ministry.')->group(function () {
    Route::view('panel', 'ministry.panel')->name('panel');

    Route::get('partymanager', [PartymanagerController::class, 'index'])->name('manage.partymanager');
    Route::post('partymanager/{id}', [PartymanagerController::class, 'assignRole'])->name('assignRole.partymanager');
    Route::delete('partymanager/{id}', [PartymanagerController::class, 'removeRole'])->name('removeRole.partymanager');

    Route::resource('elections', ElectionController::class);
});

Route::middleware(['auth', 'partymanager'])->prefix('partymanager')->as('partymanager.')->group(function () {
    Route::view('panel', 'partymanager.panel')->name('panel');
    
    Route::resource('parties', PartyController::class);
    Route::resource('candidates', CandidateController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';