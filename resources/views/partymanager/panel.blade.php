@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="grid gap-6 grid-cols-1">

        <!-- Manage Parties -->
        <a href="{{ route('partymanager.parties.index') }}" class="block border rounded-lg p-6 bg-white hover:bg-gray-100 transition duration-300">
            <h3 class="text-xl font-semibold text-gray-800">Party</h3>
            <p class="text-gray-600">Manage your party.</p>
        </a>

        <!-- Manage Candidates -->
        @if(Auth::user()->party)
        <a href="{{ route('partymanager.party_candidates.index', Auth::user()->party->id) }}" class="block border rounded-lg p-6 bg-white hover:bg-gray-100 transition duration-300">
            <h3 class="text-xl font-semibold text-gray-800">Candidates</h3>
            <p class="text-gray-600">Manage candidates.</p>
        </a>
        @else
        <div class="block border rounded-lg p-6 bg-gray-200 cursor-not-allowed">
            <h3 class="text-xl font-semibold text-gray-800">Candidates</h3>
            <p class="text-gray-600">You need to create a party first.</p>
        </div>
        @endif
    </div>
</div>
@endsection