@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-5xl font-bold mb-6">Elections</h1>

    {{-- Pending Elections Section --}}
    <h2 class="text-2xl font-semibold mb-4">Pending Elections</h2>
    @if($pendingElections->isEmpty())
    <p class="text-gray-500">No pending elections at the moment.</p>
    @else
    <ul class="space-y-6">
        @foreach($pendingElections as $election)
        <li class="border rounded-lg p-6 bg-white text-black">
            <!-- Election Type -->
            <div class="text-2xl font-bold">
                {{ $election->electionType->name }}
            </div>

            <!-- Description -->
            <div class="mt-2 text-gray-600">
                {{ $election->electionType->description ?? 'No description available' }}
            </div>

            <!-- Status -->
            <div class="mt-4 text-yellow-600 font-medium">
                {{ ucfirst($election->status) }}
            </div>

            <!-- Date -->
            <div class="mt-2 text-gray-800">
                {{ $election->start_date->format('F j, Y, g:i A') }} - {{ $election->end_date->format('F j, Y, g:i A') }}
            </div>
        </li>
        @endforeach
    </ul>
    @endif

    {{-- Upcoming Elections Section --}}
    <h2 class="text-2xl font-semibold mt-8 mb-4">Upcoming Elections</h2>
    @if($upcomingElections->isEmpty())
    <p class="text-gray-500">No upcoming elections at the moment.</p>
    @else
    <ul class="space-y-6">
        @foreach($upcomingElections as $election)
        <li class="border rounded-lg p-6 bg-white text-black">
            <!-- Election Type -->
            <div class="text-2xl font-bold">
                {{ $election->electionType->name }}
            </div>

            <!-- Description -->
            <div class="mt-2 text-gray-600">
                {{ $election->electionType->description ?? 'No description available' }}
            </div>

            <!-- Status -->
            <div class="mt-4 text-blue-600 font-medium">
                {{ ucfirst($election->status) }}
            </div>

            <!-- Date -->
            <div class="mt-2 text-gray-800">
                {{ $election->start_date->format('F j, Y, g:i A') }} - {{ $election->end_date->format('F j, Y, g:i A') }}
            </div>
        </li>
        @endforeach
    </ul>
    @endif

    {{-- Finished Elections Section --}}
    <h2 class="text-2xl font-semibold mt-8 mb-4">Finished Elections</h2>
    @if($finishedElections->isEmpty())
    <p class="text-gray-500">No finished elections at the moment.</p>
    @else
    <ul class="space-y-6">
        @foreach($finishedElections as $election)
        <li class="border rounded-lg p-6 bg-white text-black">
            <!-- Election Type -->
            <div class="text-2xl font-bold">
                {{ $election->electionType->name }}
            </div>

            <!-- Description -->
            <div class="mt-2 text-gray-600">
                {{ $election->electionType->description ?? 'No description available' }}
            </div>

            <!-- Status -->
            <div class="mt-4 text-green-600 font-medium">
                {{ ucfirst($election->status) }}
            </div>

            <!-- Date -->
            <div class="mt-2 text-gray-800">
                {{ $election->start_date->format('F j, Y, g:i A') }} - {{ $election->end_date->format('F j, Y, g:i A') }}
            </div>
        </li>
        @endforeach
    </ul>
    @endif
</div>
@endsection