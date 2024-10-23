<?php

namespace App\Http\Controllers\Partymanager;

use App\Models\Party;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartyCandidateController extends Controller
{
    public function index(Party $party)
    {
        $candidates = $party->candidates()->withPivot('position')->orderBy('pivot_position')->get();

        return view('partymanager.parties.candidates.index', compact('candidates', 'party'));
    }

    public function store(Request $request, Party $party)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',  
            'position' => 'required|integer',
        ]);
    
        $candidate = Candidate::firstOrCreate(['user_id' => $request->user_id]);
    
        if ($party->candidates()->wherePivot('position', $request->position)->exists()) {
            return redirect()->back()->with('error', 'This position is already assigned to another candidate.');
        }
    
        $party->candidates()->attach($candidate->id, [
            'position' => $request->position,
            'election_type_id' => null,
        ]);
    
        return redirect()->route('partymanager.party_candidates.index', $party->id)
                         ->with('success', 'Candidate assigned successfully.');
    }
    
    public function update(Request $request, Party $party, Candidate $candidate)
    {
        $request->validate([
            'position' => 'required|integer',
        ]);

        if ($party->candidates()->wherePivot('position', $request->position)
                                ->where('candidate_id', '!=', $candidate->id)
                                ->exists()) {
            return redirect()->back()->with('error', 'This position is already assigned to another candidate.');
        }

        $party->candidates()->updateExistingPivot($candidate->id, [
            'position' => $request->position,
        ]);

        return redirect()->route('partymanager.party_candidates.index', $party->id)
                         ->with('success', 'Candidate position updated successfully.');
    }

    public function destroy(Party $party, Candidate $candidate)
    {
        $party->candidates()->detach($candidate->id);
    
        if (!$candidate->parties()->exists()) {
            $candidate->delete();
        }
    
        return redirect()->route('partymanager.party_candidates.index', $party->id)
                         ->with('success', 'Candidate removed successfully.');
    }  
}