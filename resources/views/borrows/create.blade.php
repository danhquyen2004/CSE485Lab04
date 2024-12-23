@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Add New Borrow</h1>
        <form action="{{ route('borrows.store') }}" method="POST" class="p-4 border rounded shadow-sm bg-light">
            @csrf
            <div class="mb-3">
                <label for="reader_id" class="form-label">Reader:</label>
                <select class="form-select" id="reader_id" name="reader_id" required>
                    <option value="">-- Select Reader --</option>
                    @foreach ($readers as $reader)
                        <option value="{{ $reader->id }}">{{ $reader->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="book_id" class="form-label">Book:</label>
                <select class="form-select" id="book_id" name="book_id" required>
                    <option value="">-- Select Book --</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="borrow_date" class="form-label">Borrow Date:</label>
                <input type="date" class="form-control" id="borrow_date" name="borrow_date" required>
            </div>
            <div class="mb-3">
                <label for="return_date" class="form-label">Return Date:</label>
                <input type="date" class="form-control" id="return_date" name="return_date">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="0">Borrowing</option>
                    <option value="1">Returned</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Save</button>
        </form>
    </div>
@endsection
