<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;
use App\Models\Reader;
use App\Models\Book;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrows = Borrow::orderBy('updated_at', 'desc')->paginate(5); //
        return view('borrows.index', compact('borrows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $readers = Reader::all();
        $books = Book::all();
        return view('borrows.create', compact('readers', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'reader_id' => 'required|exists:readers,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:borrow_date',
            'status' => 'required|in:0,1',
        ]);
        Borrow::create([
            'reader_id' => $request->input('reader_id'), // ID của reader từ truy vấn
            'book_id' => $request->input('book_id'),     // ID của book từ truy vấn
            'borrow_date' => $request->input('borrow_date'),
            'return_date' => $request->input('return_date'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('borrows.index')->with('success', 'Thêm thành công');
    }


    /**
     * Display the specified resource.
     */
    public function show(Borrow $task)
    {
        return view('borrows.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrow $task)
    {
        return view('borrows.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrow $task)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $completed = $request->has('completed') ? 1 : 0;

        $task->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'long_description' => $request->input('long_description'),
            'completed' => $completed,
        ]);


        return redirect()->route('borrows.index')->with('success', 'Chỉnh sửa thành công');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrow $task)
    {
        $task->delete();

        return redirect()->route('borrows.index')->with('success', 'Xóa thành công!');

    }
}
