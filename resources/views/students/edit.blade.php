@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Student</h1>
        <hr>

        {{-- Edit Student Form --}}
        <form method="POST" action="{{ route('student-update', $student->id) }}">
            @csrf
            @method('PUT')

            @include('students.form')

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
