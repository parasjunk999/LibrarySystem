@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Book Category</h1>
        <hr>

        <form method="POST" action="{{ route('book-categories-store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Book Category Name:</label>
                <input type="text" name="name" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Book Category Description:</label>
                <input type="text" name="description" value="" class="form-control">
            </div>
            

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
