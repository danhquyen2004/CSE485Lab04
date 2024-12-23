@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Add new book</h1>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="author">Author:</label>
                <textarea class="form-control" id="author" name="author" required></textarea>
                </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <textarea class="form-control" id="category" name="category"></textarea>
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <textarea class="form-control" id="year" name="year"></textarea>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <textarea class="form-control" id="quantity" name="quantity"></textarea>
            </div>
            
            <button ty="submit" class="btn btn-primary">Sumbit</button>
        </form>
    </div>

@endsection

