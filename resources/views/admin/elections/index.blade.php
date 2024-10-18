@extends('layouts.app')

@section('content')
    <h1>Elections</h1>

    <a href="{{ route('admin.elections.create') }}" class="btn btn-primary">Make Election</a>

    <table class="table">
        <thead>
            <tr>
                <th>Election Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($elections as $election)
                <tr>
                    <td>{{ $election->electionType->name }}</td>
                    <td>{{ $election->start_date }}</td>
                    <td>{{ $election->end_date }}</td>
                    <td>
                        <a href="{{ route('admin.elections.edit', $election->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.elections.destroy', $election->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Cancel</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
