<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BookCategory;

class BookCategoryController extends Controller
{
    public function index()
    {
        $categories = BookCategory::all();
    return view('book-categories.index', compact('categories'));
    }
    public function create()
    {
        return view('book-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        BookCategory::create($request->all());

        return redirect()->route('book-categories-corner')->with('success', 'Book category created successfully');
    }

    public function show($id)
    {
        $category = BookCategory::findOrFail($id);
        return view('book-categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = BookCategory::findOrFail($id);
        return view('book-categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $category = BookCategory::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('book-categories-corner')->with('success', 'Book category updated successfully');
    }

    public function destroy($id)
    {
        $category = BookCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('book-categories-corner')->with('success', 'Book category deleted successfully');
    }
}
    
