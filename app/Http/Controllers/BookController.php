<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->get();
        return view('books.index', compact('books'));
}
public function create()
{
    $categories = BookCategory::all();
    return view('books.create', compact('categories'));
}

public function store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'isbn' => 'required',
        'book_category_id' => 'required',
        'publisher' => 'required',
        'author' => 'required',
        'stock_count' => 'required|numeric',
    ]);

    Book::create($request->all());

    return redirect()->route('books-corner')->with('success', 'Book created successfully');
}

public function edit($id)
{
    $book = Book::findOrFail($id);
    $categories = BookCategory::all();
    return view('books.edit', compact('book', 'categories'));
}

public function update(Request $request, $id)
{
    $this->validate($request, [
        'name' => 'required',
        'isbn' => 'required',
        'book_category_id' => 'required',
        'publisher' => 'required',
        'author' => 'required',
        'stock_count' => 'required|numeric',
    ]);

    $book = Book::findOrFail($id);
    $book->update($request->all());

    return redirect()->route('books-corner')->with('success', 'Book updated successfully');
}

public function destroy($id)
{
    $book = Book::findOrFail($id);
    $book->delete();

    return redirect()->route('books-corner')->with('success', 'Book deleted successfully');
}
}