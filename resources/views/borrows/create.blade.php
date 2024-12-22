@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Borrow</h1>
        <form action="{{ route('borrows.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="reader_id">Reader:</label>
                <select class="form-control" id="reader_id" name="reader_id" required>
                    <option value="">-- Select Reader --</option>
                    @foreach ($readers as $reader)
                        <option value="{{ $reader->id }}">{{ $reader->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="book_id">Book:</label>
                <select class="form-control" id="book_id" name="book_id" required>
                    <option value="">-- Select Book --</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="borrow_date">Borrow Date:</label>
                <input type="date" class="form-control" id="borrow_date" name="borrow_date" required>
            </div>
            <div class="form-group">
                <label for="return_date">Return Date:</label>
                <input type="date" class="form-control" id="return_date" name="return_date">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="0">Đang mượn</option>
                    <option value="1">Đã trả</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
