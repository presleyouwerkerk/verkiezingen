@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Panel</h1>

        <a href="{{ route('admin.elections.index') }}" class="btn btn-primary">Go to Elections Page</a>
    </div>
@endsection
