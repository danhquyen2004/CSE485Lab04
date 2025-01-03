@extends('layouts.app')
@section('content')
<div class="container">
        <h1>Edit book</h1>
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $book->name }}" required>
            </div>
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" class="form-control" id="category" name="category" value="{{ $book->category }}" required>
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="text" class="form-control" id="year" name="year" value="{{ $book->year }}" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $book->quantity }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Sumbit</button>
        </form>
    </div>


@endsection
