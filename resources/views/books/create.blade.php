@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Book</h1>
        <hr>

        {{-- Book Create Form --}}
        <form method="POST" action="{{ route('books-store') }}">
            @csrf
            @include('books.form')
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
