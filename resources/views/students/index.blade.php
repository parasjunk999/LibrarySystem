@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Student Corner</h1>
        <hr>

        <table id="students-table" class="table">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th>Roll No</th>
                    <th>Mobile No</th>
                    <th>Admission Number</th>
                    <th>Section</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->student_name }}</td>
                        <td>{{ $student->class }}</td>
                        <td>{{ $student->roll_no }}</td>
                        <td>{{ $student->mobile_no }}</td>
                        <td>{{ $student->admission_nom }}</td>
                        <td>{{ $student->section }}</td>
                        <td>
                            <a href="{{ route('student-edit', $student->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('student-delete', $student->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Button to Create Student --}}
        <a href="{{ route('student-create') }}" class="btn btn-success">Create Student</a>

        {{-- Button to go back to Dashboard --}}
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
    </div>

    <script>
        $(document).ready(function() {
            $('#students-table').DataTable();
        });
    </script>
@endsection
