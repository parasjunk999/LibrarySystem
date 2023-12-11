<!-- resources/views/books/_form.blade.php -->

<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" class="form-control" value="{{ $book->name ?? old('name') }}" required>
</div>

<div class="form-group">
    <label for="isbn">ISBN:</label>
    <input type="text" name="isbn" class="form-control" value="{{ $book->isbn ?? old('isbn') }}" required>
</div>

<div class="form-group">
    <label for="book_category_id">Book Category:</label>
    <select name="book_category_id" class="form-control" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ isset($book) && $book->book_category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="publisher">Publisher:</label>
    <input type="text" name="publisher" class="form-control" value="{{ $book->publisher ?? old('publisher') }}" required>
</div>

<div class="form-group">
    <label for="author">Author:</label>
    <input type="text" name="author" class="form-control" value="{{ $book->author ?? old('author') }}" required>
</div>

<div class="form-group">
    <label for="stock_count">Stock Count:</label>
    <input type="number" name="stock_count" class="form-control" value="{{ $book->stock_count ?? old('stock_count') }}" required>
</div>
