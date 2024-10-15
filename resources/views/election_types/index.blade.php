@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Election Types</h1>

                @if(Auth::user()->role === 'ministry')
                    <a href="{{ route('election_types.create') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-200 disabled:opacity-25 transition mb-4">
                        Create New Election
                    </a>
                @endif

                <ul class="space-y-2">
                    @foreach($electionTypes as $type)
                        <li class="p-4 bg-gray-100 rounded-md border border-gray-300 flex justify-between items-center">
                            <div>
                                <strong>{{ $type->name }}</strong> - {{ $type->description }}
                            </div>
                            <span class="ml-4 text-sm text-gray-500">
                                Status: {{ ucfirst($type->status) }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
