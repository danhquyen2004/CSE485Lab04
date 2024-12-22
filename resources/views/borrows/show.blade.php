@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chi tiết công việc</h1>
        <p><strong>Tiêu đề:</strong> {{ $task->title }}</p>
        <p><strong>Mô tả:</strong> {{ $task->description }}</p>
        <p><strong>Mô tả chi tiết:</strong> {{ $task->long_description }}</p>
        <p><strong>Trạng thái:</strong> {{ $task->completed ? 'Hoàn thành' : 'Chưa hoàn thành' }}</p>
        <a href="{{ route('borrows.index') }}" class="btn btn-secondary">Quay lại</a>
    </div>
@endsection