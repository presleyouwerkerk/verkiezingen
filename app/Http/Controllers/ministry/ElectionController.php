<?php

namespace App\Http\Controllers\Ministry;

use App\Http\Controllers\Controller;
use App\Models\Election;
use App\Models\ElectionType;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    public function index()
    {
        $elections = Election::with('electionType')->get();
        return view('ministry.elections.index', compact('elections'));
    }

    public function create()
    {
        $electionTypes = ElectionType::all();
        return view('ministry.elections.create', compact('electionTypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'election_type_id' => 'required|exists:election_types,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Election::create($validated);

        return redirect()->route('ministry.elections.index')->with('success', 'Election created successfully.');
    }

    public function edit(Election $election)
    {
        $electionTypes = ElectionType::all();
        return view('ministry.elections.edit', compact('election', 'electionTypes'));
    }

    public function update(Request $request, Election $election)
    {
        $validated = $request->validate([
            'election_type_id' => 'required|exists:election_types,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $election->update($validated);

        return redirect()->route('ministry.elections.index')->with('success', 'Election updated successfully.');
    }

    public function destroy(Election $election)
    {
        $election->parties()->detach();
        $election->candidates()->detach();

        $election->delete();

        return redirect()->route('ministry.elections.index')->with('success', 'Election canceled successfully.');
    }
}
