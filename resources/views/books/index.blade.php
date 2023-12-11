@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Books</h1>
        <hr>

        <table id="books-table" class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>ISBN</th>
                    <th>Book Category</th>
                    <th>Publisher</th>
                    <th>Author</th>
                    <th>Stock Count</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->book_category_id }}</td>
                        <td>{{ $book->publisher }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->stock_count }}</td>
                        <td>{{ $book->created_at }}</td>
                        <td>{{ $book->updated_at }}</td>
                        <td>
                            <a href="{{ route('books-edit', $book->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('books-delete', $book->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Button to Create Book --}}
        <a href="{{ route('books-create') }}" class="btn btn-success">Add Book</a>

        {{-- Button to go back to Dashboard --}}
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
    </div>

    <script>
        $(document).ready(function() {
            $('#books-table').DataTable({
                "paging": true,
                "searching": true
            });
        });
    </script>
@endsection
