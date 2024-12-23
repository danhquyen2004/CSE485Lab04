<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ReaderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});


Route::resource('borrows', BorrowController::class);
Route::resource('books', BookController::class);
Route::resource('readers', ReaderController::class);

