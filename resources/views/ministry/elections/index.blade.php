@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Title -->
    <h1 class="text-5xl font-bold mb-6">Elections</h1>

    <!-- Create Election Button -->
    <a href="{{ route('ministry.elections.create') }}" class="inline-block mb-6 px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300">
        Make Election
    </a>

    <!-- Elections Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead>
                <tr class="bg-gray-50">
                    <th class="text-left py-3 px-4 font-semibold text-gray-700">Election Type</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-700">Start Date</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-700">End Date</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($elections as $election)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="py-3 px-4">{{ $election->electionType->name }}</td>
                        <td class="py-3 px-4">{{ $election->start_date->format('F j, Y, g:i A') }}</td>
                        <td class="py-3 px-4">{{ $election->end_date->format('F j, Y, g:i A') }}</td>
                        <td class="py-3 px-4">
                            <!-- Candidates Button -->
                            <a href="{{ route('ministry.elections.show-parties', $election->id) }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300 font-semibold mr-4">
                                Candidates
                            </a>

                            <!-- Edit Button -->
                            <a href="{{ route('ministry.elections.edit', $election->id) }}" class="inline-block px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition duration-300 font-semibold mr-4">
                                Edit
                            </a>

                            <!-- Cancel Button -->
                            <form action="{{ route('ministry.elections.destroy', $election->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-block px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-300 font-semibold">
                                    Cancel
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
