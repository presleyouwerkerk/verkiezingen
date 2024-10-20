@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Title -->
    <h1 class="text-5xl font-bold mb-6">Create Election</h1>

    <!-- Create Election Form -->
    <form action="{{ route('admin.elections.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <!-- Election Type Selection -->
        <div>
            <label for="election_type_id" class="block text-lg font-medium text-gray-700">Election Type</label>
            <select name="election_type_id" id="election_type_id" class="mt-1 block w-full border border-gray-300 rounded-lg p-2.5 focus:ring-blue-500 focus:border-blue-500" required>
                <option value="" disabled selected>Select an Election Type</option>
                @foreach($electionTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Start Date Input -->
        <div>
            <label for="start_date" class="block text-lg font-medium text-gray-700">Start Date</label>
            <input type="datetime-local" name="start_date" id="start_date" class="mt-1 block w-full border border-gray-300 rounded-lg p-2.5 focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <!-- End Date Input -->
        <div>
            <label for="end_date" class="block text-lg font-medium text-gray-700">End Date</label>
            <input type="datetime-local" name="end_date" id="end_date" class="mt-1 block w-full border border-gray-300 rounded-lg p-2.5 focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="inline-block bg-green-600 text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-green-700 transition duration-300">
            Create Election
        </button>
    </form>
</div>
@endsection
