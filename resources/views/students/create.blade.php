@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Student</h1>
        <hr>

        <form method="POST" action="{{ route('student-store') }}">
            @csrf

            <div class="form-group">
                <label for="student_name">Student Name:</label>
                <input type="text" name="student_name" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="class">Class:</label>
                <input type="text" name="class" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="roll_no">Roll No:</label>
                <input type="text" name="roll_no" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="mobile_no">Mobile No:</label>
                <input type="text" name="mobile_no" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="addmission_nom">Admission Number:</label>
                <input type="text" name="admission_nom" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="section">Section:</label>
                <input type="text" name="section" value="" class="form-control">
            </div>
            

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
