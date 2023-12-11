@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Book</h1>
        <hr>

        {{-- Book Edit Form --}}
        <form method="POST" action="{{ route('books-update', $book->id) }}">
            @csrf
            @method('PUT')
            @include('books.form')
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
