@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Book Category</h1>
        <hr>

        {{-- Edit Student Form --}}
        <form method="POST" action="{{ route('book-categories-update', $category->id) }}">
            @csrf
            @method('PUT')

            @include('book-categories.form')

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
