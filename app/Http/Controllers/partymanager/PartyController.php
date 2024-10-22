<?php

namespace App\Http\Controllers\Partymanager;

use App\Models\Party;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PartyController extends Controller
{
    public function index()
    {
        $parties = Party::all();
        return view('partymanager.parties.index', compact('parties'));
    }

    public function create()
    {
        if (Auth::user()->party) {
            return redirect()->route('partymanager.parties.index')->with('error', 'You already have a party and cannot create another.');
        }

        return view('partymanager.parties.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->party) {
            return redirect()->route('partymanager.parties.index')->with('error', 'You already have a party and cannot create another.');
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
        return view('partymanager.parties.edit', compact('party'));
    }

    public function update(Request $request, Party $party)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $party->update($request->all());

        return redirect()->route('partymanager.parties.index')->with('success', 'Party updated successfully.');
    }

    public function destroy(Party $party)
    {
        $party->delete();
        return redirect()->route('partymanager.parties.index')->with('success', 'Party deleted successfully.');
    }
}