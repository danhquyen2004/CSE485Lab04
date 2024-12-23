@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chi Tiết Mượn Sách</h1>
        
        <div class="card">
            <div class="card-header">
                Thông Tin Mượn Sách
            </div>
            <div class="card-body">
                <h5 class="card-title">Độc Giả: {{ $borrow->reader->name }}</h5>
                <p class="card-text"><strong>Sách:</strong> {{ $borrow->book->name }}</p>
                <p class="card-text"><strong>Ngày Mượn:</strong> {{ $borrow->borrow_date }}</p>
                <p class="card-text"><strong>Ngày Trả:</strong> {{ $borrow->return_date ?? 'Chưa trả' }}</p>
                <p class="card-text"><strong>Trạng Thái:</strong> {{ $borrow->status == 0 ? 'Đang mượn' : 'Đã trả' }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('borrows.index') }}" class="btn btn-primary">Quay lại danh sách</a>
            </div>
        </div>
    </div>
@endsection