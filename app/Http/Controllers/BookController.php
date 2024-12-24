<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->paginate(5);
        return view("books.index", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'year' => 'required',
            'quantity' => 'required',

        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, book $book)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'year' => 'required',
            'quantity' => 'required',
        ]);
        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(book $book)
    {

        // Kiểm tra các bản ghi liên quan trong bảng borrows
        $unreturnedBorrows = Borrow::where('book_id', $book->id)
            ->where('status', '!=', 1) // Giả sử trạng thái "returned" là đã trả
            ->get();

        if ($unreturnedBorrows->isNotEmpty()) {
            return redirect()->route('books.index')->with('fail', 'Cannot delete a book that is currently borrowed.');
        }

        Borrow::where('book_id', $book->id)->delete();
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
