@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome, {{ auth()->user()->name }}!</h1>
    <hr>

    {{-- Button to open the student corner --}}
    <a href="{{ route('student-corner') }}" class="btn btn-primary">Open Student Corner</a>

    {{-- Button to open book categories --}}
    <a href="{{ route('book-categories-corner') }}" class="btn btn-primary">Open Book Category Corner</a>

    {{-- Button to open book corner --}}
    <a href="{{ route('books-corner') }}" class="btn btn-primary">Open Book Corner</a>

     {{-- Button to open issue library card corner --}}
     <a href="{{ route('issue-library-cards-corner') }}" class="btn btn-primary">Open Issue Library Card Corner</a>
</div>
@endsection
