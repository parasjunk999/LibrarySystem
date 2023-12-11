<!-- resources/views/issue_library_cards/_form.blade.php -->

<div class="form-group">
    <label for="student_id">Student:</label>
    <select name="student_id" class="form-control" required>
        @foreach($students as $student)
            <option value="{{ $student->id }}" {{ isset($issueLibraryCard) && $issueLibraryCard->student_id == $student->id ? 'selected' : '' }}>
                {{ $student->student_name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="card_no">Card Number:</label>
    <input type="text" name="card_no" class="form-control" value="{{ $issueLibraryCard->card_no ?? old('card_no') }}" required>
</div>

<div class="form-group">
    <label for="issue_date">Issue Date:</label>
    <input type="date" name="issue_date" class="form-control" value="{{ $issueLibraryCard->issue_date ?? old('issue_date') }}" required>
</div>

<div class="form-group">
    <label for="card_status">Card Status:</label>
    <select name="card_status" class="form-control" required>
        <option value="issued" {{ isset($issueLibraryCard) && $issueLibraryCard->card_status == 'issued' ? 'selected' : '' }}>Issued</option>
        <option value="returned" {{ isset($issueLibraryCard) && $issueLibraryCard->card_status == 'returned' ? 'selected' : '' }}>Returned</option>
    </select>
</div>
