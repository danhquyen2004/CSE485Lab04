@extends('readers.app')

@section('content')
    <div class="container">
        <h1>Reader List</h1>
        @if (session('success'))
            <div class="text-success"> {{ session('success') }}</div>
        @endif
        <a href="{{ route('readers.create') }}" class="btn btn-primary">Add Reader</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>Adress</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($readers as $reader)
                    <tr>
                        <td>{{ $reader->id }}</td>
                        <td>{{ $reader->name }}</td>
                        <td>{{ $reader->birthday }}</td>
                        <td>{{ $reader->phone }}</td>
                        <td>
                            <a href="{{ route('readers.show', $reader->id) }}" class="btn btn-info">Watch</a>
                            <a href="{{ route('readers.edit', $reader->id) }}" class="btn btn-warning">Edit</a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" 
                                    onclick="setDeleteAction('{{ route('readers.destroy', $reader->id) }}')">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div> {{ $readers->links() }}</div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this reader?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    function setDeleteAction(actionUrl) {
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.setAttribute('action', actionUrl);
    }
</script>
@endsection
