@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Issued Library Cards</h1>
        <hr>

        {{-- DataTable --}}
        <table class="table" id="issueLibraryCardsTable">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Card Number</th>
                    <th>Issue Date</th>
                    <th>Card Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($issueLibraryCards as $card)
                    <tr>
                        <td>{{ $card->student->student_name }}</td>
                        <td>{{ $card->card_no }}</td>
                        <td>{{ $card->issue_date }}</td>
                        <td>{{ $card->card_status }}</td>
                        <td>
                            {{-- Add options for editing and returning cards --}}
                            <a href="{{ route('issue-library-cards-edit', $card->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('issue-library-cards-delete', $card->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Return</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
           {{-- Button to Create Book --}}
           <a href="{{ route('issue-library-cards-create') }}" class="btn btn-success">Issue New Library Card</a>

           {{-- Button to go back to Dashboard --}}
           <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
    </div>

    <script>
        // Initialize DataTable
        $(document).ready(function() {
            $('#issueLibraryCardsTable').DataTable();
        });
    </script>
@endsection
