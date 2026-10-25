@extends('layout')
@section('content')
@if (session('success'))
<div class="alert alert-success" mt-3>
    {{ session('success') }}
</div>
@endif
@section('title')
home
@endsection
<h1>users</h1>

<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Actions</th>
            <th >
                <div class="ml-3">
                    <a href="{{ route('create') }}" class="btn btn-success btn-sm align-middle ">Create User</a>
                </div>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->age }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('edit', ['id' => $user->id]) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('delete', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?')">
                         @csrf
                         @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
@endsection
