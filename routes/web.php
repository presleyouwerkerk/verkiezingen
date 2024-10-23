<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Ministry\ElectionController;
use App\Http\Controllers\Ministry\ElectionPartyController;
use App\Http\Controllers\Ministry\PartymanagerController;
use App\Http\Controllers\Partymanager\PartyController;
use App\Http\Controllers\Partymanager\CandidateController;
use App\Http\Controllers\Partymanager\PartyCandidateController;

Route::view('/', 'welcome');

Route::get('dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'ministry'])->prefix('ministry')->as('ministry.')->group(function () {
    Route::view('panel', 'ministry.panel')->name('panel');

    Route::get('partymanager', [PartymanagerController::class, 'index'])->name('manage.partymanager');
    Route::post('partymanager/{id}', [PartymanagerController::class, 'assignRole'])->name('assignRole.partymanager');
    Route::delete('partymanager/{id}', [PartymanagerController::class, 'removeRole'])->name('removeRole.partymanager');

    Route::get('elections/{election}/parties', [ElectionPartyController::class, 'showAssignedParties'])->name('elections.show-parties');
    Route::post('elections/{election}/parties/{party}', [ElectionPartyController::class, 'assignPartyToElection'])->name('elections.assign-party');
    Route::delete('elections/{election}/parties/{party}', [ElectionPartyController::class, 'removePartyFromElection'])->name('elections.remove-party');

    Route::resource('elections', ElectionController::class);
});

Route::middleware(['auth', 'partymanager'])->prefix('partymanager')->as('partymanager.')->group(function () {
    Route::view('panel', 'partymanager.panel')->name('panel');

    Route::get('parties/{party}/candidates/search', [CandidateController::class, 'search'])->name('party_candidates.search');

    Route::get('parties/{party}/candidates', [PartyCandidateController::class, 'index'])->name('party_candidates.index');
    Route::post('parties/{party}/candidates', [PartyCandidateController::class, 'store'])->name('party_candidates.store');
    Route::patch('parties/{party}/candidates/{candidate}', [PartyCandidateController::class, 'update'])->name('party_candidates.update');
    Route::delete('parties/{party}/candidates/{candidate}', [PartyCandidateController::class, 'destroy'])->name('party_candidates.destroy');

    Route::resource('parties', PartyController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';