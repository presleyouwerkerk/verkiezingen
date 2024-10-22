<?php

namespace App\Http\Controllers\Ministry;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class PartymanagerController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');
    
        $users = collect();
        $partymanagers = User::where('role', 'partymanager')->get();
    
        if ($query) {
            $users = User::where('role', '!=', 'partymanager')
                ->where('role', '!=', 'ministry')
                ->where(function ($q) use ($query) {
                    $q->where('name', 'LIKE', "%{$query}%")
                        ->orWhere('email', 'LIKE', "%{$query}%");
                })
                ->get();
        }
    
        return view('ministry.manage.partymanager', compact('users', 'partymanagers'));
    }
    
    public function assignRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role = 'partymanager';
        $user->save();

        return redirect()->route('ministry.manage.partymanager')->with('success', 'Rol succesvol toegewezen.');
    }

    public function removeRole($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'user';
        $user->save();

        return redirect()->route('ministry.manage.partymanager')->with('success', 'Rol succesvol verwijderd.');
    }
}
