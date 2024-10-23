@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Title -->
    <h1 class="text-5xl font-bold mb-6">Manage Your Party</h1>

    <!-- Check if any party exists -->
    @if($parties->isEmpty())
    <div class="bg-yellow-200 text-black p-4 rounded mb-6">
        No parties found. Please create a party first.
    </div>
    <!-- Create Party Button -->
    <a href="{{ route('partymanager.parties.create') }}" class="inline-block px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300">
        Create Party
    </a>
    @else
    <!-- List of Parties -->
    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
        <thead>
            <tr class="bg-gray-50">
                <th class="text-left py-3 px-4 font-semibold text-gray-700">Party Name</th>
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
                    <!-- Edit Party Button -->
                    <a href="{{ route('partymanager.parties.edit', $party->id) }}" class="inline-block px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition duration-300 font-semibold mr-4">
                        Edit
                    </a>

                    <!-- Delete Party Button -->
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
    @endif
</div>
@endsection