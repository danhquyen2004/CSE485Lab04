@extends('readers.app')

@section('content')
    <div class="container">
        <h1>Details reader</h1>
        <p><strong>Name:</strong> {{ $reader->name }}</p>
        <p><strong>Birthday:</strong> {{ $reader->birthday }}</p>
        <p><strong>Adress:</strong> {{ $reader->address }}</p>
        <p><strong>Phone:</strong> {{ $reader->phone }}</p>
        <a href="{{ route('readers.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
