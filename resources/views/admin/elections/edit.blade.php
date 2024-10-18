@extends('layouts.app')

@section('content')
    <h1>Edit Election</h1>

    <form action="{{ route('admin.elections.update', $election->id) }}" method="POST">
        @csrf
        @method('PATCH')  <!-- This is crucial for sending the PATCH request -->

        <div class="form-group">
            <label for="election_type_id">Election Type</label>
            <select name="election_type_id" class="form-control">
                @foreach($electionTypes as $type)
                    <option value="{{ $type->id }}" {{ $election->election_type_id == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="datetime-local" name="start_date" class="form-control" value="{{ $election->start_date }}" required>
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="datetime-local" name="end_date" class="form-control" value="{{ $election->end_date }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Election</button>
    </form>
@endsection
