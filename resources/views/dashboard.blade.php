@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-5xl font-bold mb-6">Elections</h1>

    {{-- Pending Elections Section --}}
    <h2 class="text-2xl font-semibold mb-4">Pending Elections</h2>
    @if($pendingElections->isEmpty())
    <p class="text-gray-500">No pending elections at the moment.</p>
    @else
    <ul class="space-y-4">
        @foreach($pendingElections as $election)
        <li class="border rounded-lg p-4 bg-blue-50">
            <strong class="text-lg">{{ $election->name }}</strong>Type: {{ $election->electionType->name }}
            <br>Description: {{ $election->electionType->description ?? 'No description available' }}
            <br>Status: <span class="text-blue-600">{{ ucfirst($election->status) }}</span>
            <br>Starts: {{ $election->start_date->format('Y-m-d H:i') }}
            <br>Ends: {{ $election->end_date->format('Y-m-d H:i') }}
        </li>
        @endforeach
    </ul>
    @endif

    {{-- Upcoming Elections Section --}}
    <h2 class="text-2xl font-semibold mt-8 mb-4">Upcoming Elections</h2>
    @if($upcomingElections->isEmpty())
    <p class="text-gray-500">No upcoming elections at the moment.</p>
    @else
    <ul class="space-y-4">
        @foreach($upcomingElections as $election)
        <li class="border rounded-lg p-4 bg-yellow-50">
            <strong class="text-lg">{{ $election->name }}</strong>Type: {{ $election->electionType->name }}
            <br>Description: {{ $election->electionType->description ?? 'No description available' }}
            <br>Status: <span class="text-yellow-600">{{ ucfirst($election->status) }}</span>
            <br>{{ $election->start_date->format('Y-m-d H:i') }} {{ $election->end_date->format('Y-m-d H:i') }}
        </li>
        @endforeach
    </ul>
    @endif

    {{-- Finished Elections Section --}}
    <h2 class="text-2xl font-semibold mt-8 mb-4">Finished Elections</h2>
    @if($finishedElections->isEmpty())
    <p class="text-gray-500">No finished elections at the moment.</p>
    @else
    <ul class="space-y-4">
        @foreach($finishedElections as $election)
        <li class="border rounded-lg p-4 bg-gray-50">
            <strong class="text-lg">{{ $election->name }}</strong>Type: {{ $election->electionType->name }}
            <br>Description: {{ $election->electionType->description ?? 'No description available' }}
            <br>Status: <span class="text-gray-600">{{ ucfirst($election->status) }}</span>
            <br>Starts: {{ $election->start_date->format('Y-m-d H:i') }}
            <br>Ends: {{ $election->end_date->format('Y-m-d H:i') }}
        </li>
        @endforeach
    </ul>
    @endif
</div>
@endsection