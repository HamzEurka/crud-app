@extends('layout')
@section('content')
<div class="col-4">
    <h2>{{ $action }}</h2>
    <form method="POST" action="/{{$actionUrl}}" class="form">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text"
                   name="name"
                   id="name"
                   class="form-control" value="{{ old('name', $user->name ?? '') }}" class="form-control @error('name') is-invalid @enderror" >
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number"
                   class="form-control"
                   id="age" name="age"
                   value="{{ old('age', $user->age ?? '') }}" class="form-control @error('age') is-invalid @enderror" >
            @error('age')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email"
                   class="form-control"
                   id="email"
                   name="email"
                   value="{{ old('email', $user->email ?? '') }}" class="form-control @error('email') is-invalid @enderror" >
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
