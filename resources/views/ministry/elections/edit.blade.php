@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Title -->
    <h1 class="text-5xl font-bold mb-6">Edit Election</h1>

    <!-- Edit Election Form -->
    <form action="{{ route('ministry.elections.update', $election->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PATCH') <!-- Using PATCH for updating the election -->

        <!-- Election Type Selection -->
        <div>
            <label for="election_type_id" class="block text-lg font-medium text-gray-700">Election Type</label>
            <select name="election_type_id" id="election_type_id" class="mt-1 block w-full border border-gray-300 rounded-lg p-2.5 focus:ring-blue-500 focus:border-blue-500">
                @foreach($electionTypes as $type)
                    <option value="{{ $type->id }}" {{ $election->election_type_id == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Start Date Input -->
        <div>
            <label for="start_date" class="block text-lg font-medium text-gray-700">Start Date</label>
            <input type="datetime-local" name="start_date" id="start_date" class="mt-1 block w-full border border-gray-300 rounded-lg p-2.5 focus:ring-blue-500 focus:border-blue-500" value="{{ $election->start_date->format('Y-m-d\TH:i') }}" required>
        </div>

        <!-- End Date Input -->
        <div>
            <label for="end_date" class="block text-lg font-medium text-gray-700">End Date</label>
            <input type="datetime-local" name="end_date" id="end_date" class="mt-1 block w-full border border-gray-300 rounded-lg p-2.5 focus:ring-blue-500 focus:border-blue-500" value="{{ $election->end_date->format('Y-m-d\TH:i') }}" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="inline-block bg-green-600 text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-green-700 transition duration-300">
            Update Election
        </button>
    </form>
</div>
@endsection
