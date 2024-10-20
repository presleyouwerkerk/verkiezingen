@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Title -->
    <h1 class="text-5xl font-bold mb-6">Admin Panel</h1>

    <!-- Admin Actions Section -->
    <h2 class="text-2xl font-semibold mb-4">Election Control</h2>

    <div class="space-y-4">
        <!-- Manage Elections -->
        <a href="{{ route('admin.elections.index') }}" class="block border rounded-lg p-6 bg-white hover:bg-gray-100 transition duration-300">
            <h3 class="text-xl font-semibold text-gray-800">Elections</h3>
            <p class="text-gray-600">Manage elections.</p>
        </a>

        <!-- Manage Parties -->
        <a href="#" class="block border rounded-lg p-6 bg-white hover:bg-gray-100 transition duration-300">
            <h3 class="text-xl font-semibold text-gray-800">Parties</h3>
            <p class="text-gray-600">Manage parties.</p>
        </a>

        <!-- Manage Candidates -->
        <a href="#" class="block border rounded-lg p-6 bg-white hover:bg-gray-100 transition duration-300">
            <h3 class="text-xl font-semibold text-gray-800">Candidates</h3>
            <p class="text-gray-600">Manage candidates.</p>
        </a>
    </div>
</div>
@endsection
