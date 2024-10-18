@extends('layouts.app')

@section('content')
    <h1>Create Election</h1>

    <form action="{{ route('admin.elections.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="election_type_id">Election Type</label>
            <select name="election_type_id" class="form-control" required>
                <option value="" disabled selected>Select an Election Type</option>
                @foreach($electionTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="datetime-local" name="start_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="datetime-local" name="end_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Create Election</button>
    </form>
@endsection
