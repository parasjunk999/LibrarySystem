@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Issued Library Card</h1>
        <hr>

        {{-- Edit Issued Library Card Form --}}
        <form method="POST" action="{{ route('issue-library-cards-update', $issueLibraryCard->id) }}">
            @csrf
            @method('PUT')
            @include('issue_library_cards.form')
            <button type="submit" class="btn btn-primary">Update Card</button>
        </form>
    </div>
@endsection
