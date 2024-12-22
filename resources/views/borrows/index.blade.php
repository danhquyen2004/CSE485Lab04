@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <!-- Hiển thị thông báo thành công -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h1>List Borrow</h1>
        <a href="{{ route('borrows.create') }}" class="btn btn-primary mb-3">Add borrow</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Reader</th>
                    <th>Book</th>
                    <th>Borrow date</th>
                    <th>Return date</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrows as $borrow)
                    <tr>
                        <td>{{ $borrow->id }}</td>
                        <td>{{ $borrow->reader->name }}</td>
                        <td>{{ $borrow->book->name }}</td>
                        <td>{{ $borrow->borrow_date }}</td>
                        <td>{{ $borrow->return_date }}</td>
                        <td>{{ $borrow->status == 0 ? 'dang muon' : 'da tra' }}</td>
                        <td>
                            <a href="{{ route('borrows.show', $borrow->id) }}" class="btn btn-info btn-sm">Xem</a>
                            <a href="{{ route('borrows.edit', $borrow->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <!-- Nút mở modal xác nhận xóa -->
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" 
                                data-bs-target="#deleteModal" data-task-id="{{ $borrow->id }}">
                                Xóa
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div> {{ $borrows->links('pagination::bootstrap-4') }}</div>
    </div>

    <!-- Modal Xác nhận xóa -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa task này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <!-- Form xóa -->
                    <form id="deleteForm" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteModal = document.getElementById('deleteModal');
            const deleteForm = document.getElementById('deleteForm');

            // Lắng nghe sự kiện mở modal
            deleteModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget; // Nút kích hoạt modal
                const borrowId = button.getAttribute('data-task-id'); // Lấy task ID từ data attribute

                // Gán URL cho form xóa
                deleteForm.action = `/borrows/${borrowId}`;
            });
        });
    </script>

    <!-- Bootstrap CSS và JS (qua CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
