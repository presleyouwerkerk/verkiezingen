@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-5xl font-bold mb-6">Manage Candidates for {{ $party->name }}</h1>

    <!-- Search Form -->
    <form method="GET" action="{{ route('partymanager.party_candidates.search', $party->id) }}" class="mb-6">
        <input type="text" name="search" placeholder="Search User..." class="border rounded-lg p-2 w-full md:w-1/3">
        <button type="submit" class="bg-blue-500 text-white rounded-lg px-4 py-2 mt-2 hover:bg-blue-600 transition duration-300">Search</button>
    </form>

    <!-- Candidates List -->
    <h2 class="text-2xl font-semibold mt-8 mb-4">Candidates List for {{ $party->name }}</h2>

    @if($candidates->isEmpty())
        <p class="text-gray-500">No candidates found for this party.</p>
    @else
        <ul class="space-y-6">
            @foreach($candidates as $candidate)
                <li class="border rounded-lg p-6 bg-white text-black">
                    <div class="flex justify-between items-center">
                        <div>
                            <div class="text-xl font-bold">{{ $candidate->user->name }}</div>
                            <div class="text-gray-600">{{ $candidate->user->email }}</div>
                            <div class="text-sm text-gray-500">Position: {{ $candidate->pivot->position }}</div>
                        </div>
                        <!-- Remove Candidate Button -->
                        <form action="{{ route('partymanager.party_candidates.destroy', [$party->id, $candidate->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-block px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-300 font-semibold">
                                Remove Candidate
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
