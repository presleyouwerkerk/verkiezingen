<?php

namespace App\Http\Controllers\Partymanager;

use App\Models\Party;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CandidateController extends Controller
{
    public function search(Request $request, Party $party)
    {
        $users = $request->has('search') && !empty($request->input('search'))
            ? User::where('name', 'LIKE', "%{$request->input('search')}%")->get()
            : collect();
    
        return view('partymanager.parties.candidates.search', compact('users', 'party'));
    }
    
}
