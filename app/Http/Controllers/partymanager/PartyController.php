<?php

namespace App\Http\Controllers\Partymanager;

use App\Models\Party;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PartyController extends Controller
{
    public function index()
    {
        $parties = Party::where('user_id', auth()->id())->get();
        return view('partymanager.parties.index', compact('parties'));
    }

    public function create()
    {
        if (Auth::user()->party) {
            return redirect()->route('partymanager.parties.index')->with('error', 'You already have a party.');
        }

        return view('partymanager.parties.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->party) {
            return redirect()->route('partymanager.parties.index')->with('error', 'You already have a party.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Party::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('partymanager.parties.index')->with('success', 'Party created successfully.');
    }

    public function edit(Party $party)
    {
        if ($party->user_id !== auth()->id()) {
            return redirect()->route('partymanager.parties.index')->with('error', 'You are not authorized to edit this party.');
        }

        return view('partymanager.parties.edit', compact('party'));
    }

    public function update(Request $request, Party $party)
    {
        if ($party->user_id !== auth()->id()) {
            return redirect()->route('partymanager.parties.index')->with('error', 'You are not authorized to update this party.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $party->update($request->all());

        return redirect()->route('partymanager.parties.index')->with('success', 'Party updated successfully.');
    }

    public function destroy(Party $party)
    {
        if ($party->user_id !== auth()->id()) {
            return redirect()->route('partymanager.parties.index')->with('error', 'You are not authorized to delete this party.');
        }

        $candidateIds = $party->candidates->pluck('id')->toArray();
        $party->candidates()->detach();

        Candidate::whereIn('id', $candidateIds)->delete();

        $party->delete();

        return redirect()->route('partymanager.parties.index')->with('success', 'Party and its candidates deleted successfully.');
    }
}
