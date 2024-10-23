@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-5xl font-bold mb-6">Search Candidates</h1>

    <!-- Search Form -->
    <form method="GET" action="{{ route('partymanager.party_candidates.search', $party->id) }}" class="mb-6">
        <input type="text" name="search" placeholder="Search User..." class="border rounded-lg p-2 w-full md:w-1/3">
        <button type="submit" class="bg-blue-500 text-white rounded-lg px-4 py-2 mt-2 hover:bg-blue-600 transition duration-300">Search</button>
    </form>

    <!-- Search Results -->
    @if($users->isEmpty())
    <p class="text-gray-500">No users found.</p>
    @else
    <h2 class="text-2xl font-semibold mb-4">Search Results</h2>
    <ul class="space-y-6">
        @foreach($users as $user)
        <li class="border rounded-lg p-6 bg-white text-black">
            <div class="flex justify-between items-center">
                <div>
                    <div class="text-xl font-bold">{{ $user->name }}</div>
                    <div class="text-gray-600">{{ $user->email }}</div>
                </div>
                <!-- Assign as Candidate Button -->
                <form action="{{ route('partymanager.party_candidates.store', $party->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <input type="number" name="position" placeholder="Position" required class="border rounded-lg p-2 w-1/4">
                    <button type="submit" class="inline-block px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300 font-semibold">
                        Assign as Candidate
                    </button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>
    @endif
</div>
@endsection