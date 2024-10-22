@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Title -->
    <h1 class="text-5xl font-bold mb-6">Political Parties</h1>

    <!-- Create Party Button: Only visible if user does not already have a party -->
    @if(!Auth::user()->party)
        <a href="{{ route('partymanager.parties.create') }}" class="inline-block mb-6 px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300">
            Create New Party
        </a>
    @endif

    <!-- Parties Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead>
                <tr class="bg-gray-50">
                    <th class="text-left py-3 px-4 font-semibold text-gray-700">Name</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-700">Description</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($parties as $party)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="py-3 px-4">{{ $party->name }}</td>
                        <td class="py-3 px-4">{{ $party->description }}</td>
                        <td class="py-3 px-4">
                            <!-- Edit Button -->
                            <a href="{{ route('partymanager.parties.edit', $party->id) }}" class="inline-block px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition duration-300 font-semibold mr-4">
                                Edit
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('partymanager.parties.destroy', $party->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-block px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-300 font-semibold">
                                    Delete
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
