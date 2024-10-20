<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        $users = User::where('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->get();

        return view('users.index', compact('users'));
    }

    public function assignRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role = 'partijbeheerder';
        $user->save();

        return redirect()->back()->with('success', 'Rol succesvol toegewezen.');
    }
}
