<?php

namespace App\Http\Controllers\Ministry;

use App\Models\Election;
use App\Models\Party;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ElectionPartyController extends Controller
{
    public function showAssignedParties(Election $election)
    {
        $parties = Party::with('candidates')->get();

        return view('ministry.elections.party.assign', compact('election', 'parties'));
    }

    public function assignPartyToElection(Election $election, Party $party)
    {
        $election->parties()->attach($party->id);

        return redirect()->route('ministry.elections.show-parties', $election->id)
            ->with('success', 'Party assigned to election successfully.');
    }

    public function removePartyFromElection(Election $election, Party $party)
    {
        $election->parties()->detach($party->id);

        return redirect()->route('ministry.elections.show-parties', $election->id)
            ->with('success', 'Party removed from election successfully.');
    }
}
