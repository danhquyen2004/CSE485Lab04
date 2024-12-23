@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Reader</h1>
        <form action="{{ route('readers.update', $reader->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $reader->name}}" required>
            </div>
            <div class="form-group">
                <label for="birthday" class="form-label">Birthday</label>
                <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $reader->birthday}}" required>
            </div>
            <div class="form-group">
                <label for="address" class="form-label">Address</label>
                <textarea type="text" class="form-control" id="address" name="address" required>{{ $reader->address }}</textarea>
            </div>
            <div class="form-group form-check">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $reader->phone}}" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
