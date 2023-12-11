@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Book Categories</h1>
        <hr>

        <table id="book-categories-table" class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('book-categories-edit', $category->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('book-categories-delete', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Button to Create Book Category --}}
        <a href="{{ route('book-categories-create') }}" class="btn btn-success">Add Book Category</a>
         {{-- Button to go back to Dashboard --}}
         <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
    </div>

    <script>
        $(document).ready(function() {
            $('#book-categories-table').DataTable();
        });
    </script>
@endsection
