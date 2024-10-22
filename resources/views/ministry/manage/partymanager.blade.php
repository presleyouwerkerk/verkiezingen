@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-5xl font-bold mb-6">Manage Partymanagers</h1>

    <!-- Search Form -->
    <form method="GET" action="{{ route('ministry.manage.partymanager') }}" class="mb-6">
        <input type="text" name="search" placeholder="Search User..." class="border rounded-lg p-2 w-full md:w-1/3">
        <button type="submit" class="bg-blue-500 text-white rounded-lg px-4 py-2 mt-2 hover:bg-blue-600 transition duration-300">Search</button>
    </form>

    <!-- Search Results -->
    <h2 class="text-2xl font-semibold mb-4">Search Results</h2>

    @if($users->isEmpty())
    <p class="text-gray-500">No users found.</p>
    @else
    <ul class="space-y-6">
        @foreach($users as $user)
        <li class="border rounded-lg p-6 bg-white text-black">
            <div class="flex justify-between items-center">
                <div>
                    <div class="text-xl font-bold">{{ $user->name }}</div>
                    <div class="text-gray-600">{{ $user->email }}</div>
                </div>
                <!-- Green "Assign Role" Button -->
                <form action="{{ route('ministry.assignRole.partymanager', $user->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="inline-block px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300 font-semibold">
                        Assign Role
                    </button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>
    @endif

    <!-- Partymanagers Section -->
    <h2 class="text-2xl font-semibold mt-8 mb-4">Partymanagers</h2>

    @if($partymanagers->isEmpty())
    <p class="text-gray-500">Geen partymanagers gevonden.</p>
    @else
    <ul class="space-y-6">
        @foreach($partymanagers as $partymanager)
        <li class="border rounded-lg p-6 bg-white text-black flex justify-between items-center">
            <div>
                <div class="text-xl font-bold">{{ $partymanager->name }}</div>
                <div class="text-gray-600">{{ $partymanager->email }}</div>
            </div>
            <!-- Red "Delete Role" Button -->
            <form action="{{ route('ministry.removeRole.partymanager', $partymanager->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-block px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-300 font-semibold">
                    Delete Role
                </button>
            </form>
        </li>
        @endforeach
    </ul>
    @endif
</div>
@endsection
