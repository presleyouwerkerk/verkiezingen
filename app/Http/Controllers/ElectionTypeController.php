<?php

namespace App\Http\Controllers;

use App\Models\ElectionType;
use Illuminate\Http\Request;

class ElectionTypeController extends Controller
{
    public function index()
    {
        $electionTypes = ElectionType::all();
        return view('election_types.index', compact('electionTypes'));
    }

    public function create()
    {
        return view('election_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        ElectionType::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('election_types.index')->with('success', 'Election Type Registered!');
    }
}