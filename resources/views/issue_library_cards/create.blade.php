<!-- resources/views/issue_library_cards/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Issue Library Card</h1>
        <hr>

        {{-- Display validation errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Issue Library Card Form --}}
        <form method="POST" action="{{ route('issue-library-cards-store') }}">
            @csrf
            @include('issue_library_cards.form')
            <button type="submit" class="btn btn-primary">Issue Card</button>
        </form>
    </div>
@endsection
