@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Borrow Details</h1>
        
        <div class="card">
            <div class="card-header">
                Borrow Information
            </div>
            <div class="card-body">
                <h5 class="card-title">Reader: {{ $borrow->reader->name }}</h5>
                <p class="card-text"><strong>Book:</strong> {{ $borrow->book->name }}</p>
                <p class="card-text"><strong>Borrow Date:</strong> {{ $borrow->borrow_date }}</p>
                <p class="card-text"><strong>Return Date:</strong> {{ $borrow->return_date ?? 'Not returned yet' }}</p>
                <p class="card-text"><strong>Status:</strong> {{ $borrow->status == 0 ? 'Borrowing' : 'Returned' }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('borrows.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
