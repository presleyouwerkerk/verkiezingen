@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Title -->
    <h1 class="text-5xl font-bold mb-6">Assign Parties to Election</h1>

    <!-- List of Parties -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead>
                <tr class="bg-gray-50">
                    <th class="text-left py-3 px-4 font-semibold text-gray-700">Party Name</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-700">Candidates</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($parties as $party)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="py-3 px-4">{{ $party->name }}</td>
                        <td class="py-3 px-4">
                            <ul>
                                @foreach($party->candidates as $candidate)
                                    <li>{{ $candidate->user->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="py-3 px-4">
                            @if($election->parties->contains($party->id))
                                <!-- Remove from Election Button -->
                                <form action="{{ route('ministry.elections.remove-party', [$election->id, $party->id]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-block px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-300 font-semibold">
                                        Remove
                                    </button>
                                </form>
                            @else
                                <!-- Add to Election Button -->
                                <form action="{{ route('ministry.elections.assign-party', [$election->id, $party->id]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="inline-block px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300 font-semibold">
                                        Add
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
