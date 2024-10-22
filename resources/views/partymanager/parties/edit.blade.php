@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Title -->
    <h1 class="text-5xl font-bold mb-6">Edit Party</h1>

    <!-- Edit Party Form -->
    <form action="{{ route('partymanager.parties.update', $party->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT') <!-- Using PUT for updating the party -->

        <!-- Party Name Input -->
        <div>
            <label for="name" class="block text-lg font-medium text-gray-700">Party Name</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full border border-gray-300 rounded-lg p-2.5 focus:ring-blue-500 focus:border-blue-500" value="{{ $party->name }}" required>
        </div>

        <!-- Party Description Input -->
        <div>
            <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" class="mt-1 block w-full border border-gray-300 rounded-lg p-2.5 focus:ring-blue-500 focus:border-blue-500" rows="4">{{ $party->description }}</textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="inline-block bg-green-600 text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-green-700 transition duration-300">
            Update Party
        </button>
    </form>
</div>
@endsection
