@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Title -->
    <h1 class="text-5xl font-bold mb-6">Elections</h1>

    <!-- Create Election Button -->
    <a href="{{ route('admin.elections.create') }}" class="inline-block mb-6 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
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
                            <a href="{{ route('admin.elections.edit', $election->id) }}" class="text-yellow-600 hover:text-yellow-800 font-semibold mr-4">Edit</a>
                            <form action="{{ route('admin.elections.destroy', $election->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">Cancel</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
