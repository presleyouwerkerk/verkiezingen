@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Title -->
    <h1 class="text-5xl font-bold mb-6">Ministry Panel</h1>

    <!-- Ministry Actions Section -->
    <h2 class="text-2xl font-semibold mb-4">Election Control</h2>

    <div class="space-y-4">
        <!-- Manage Elections -->
        <a href="{{ route('ministry.elections.index') }}" class="block border rounded-lg p-6 bg-white hover:bg-gray-100 transition duration-300">
            <h3 class="text-xl font-semibold text-gray-800">Elections</h3>
            <p class="text-gray-600">Manage elections.</p>
        </a>

        <!-- Manage Partymanagers -->
        <a href="{{ route('ministry.manage.partymanager') }}" class="block border rounded-lg p-6 bg-white hover:bg-gray-100 transition duration-300">
            <h3 class="text-xl font-semibold text-gray-800">Partymanagers</h3>
            <p class="text-gray-600">Manage partymanagers.</p>
        </a>
    </div>
</div>
@endsection