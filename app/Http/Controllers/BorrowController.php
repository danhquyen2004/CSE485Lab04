<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;

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
        return view('borrows.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $completed = $request->has('completed') ? 1 : 0;

        Borrow::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'long_description' => $request->input('long_description'),
            'completed' => $completed,
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
