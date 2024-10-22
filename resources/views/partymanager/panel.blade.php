@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Title -->
    <h1 class="text-5xl font-bold mb-6">Partymanager panel</h1>

    <!-- Partymanager Actions Section -->
    <h2 class="text-2xl font-semibold mb-4">Party control</h2>

    <div class="space-y-4">
        Manage Parties
        <a href="#" class="block border rounded-lg p-6 bg-white hover:bg-gray-100 transition duration-300">
            <h3 class="text-xl font-semibold text-gray-800">Parties</h3>
            <p class="text-gray-600">Manage parties.</p>
        </a>

        Manage Candidates
        <a href="#" class="block border rounded-lg p-6 bg-white hover:bg-gray-100 transition duration-300">
            <h3 class="text-xl font-semibold text-gray-800">Candidates</h3>
            <p class="text-gray-600">Manage candidates.</p>
        </a>
    </div>
</div>
@endsection