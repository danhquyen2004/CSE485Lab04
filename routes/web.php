<?php

use App\Http\Controllers\BorrowController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('layouts.app');
// });


Route::get('/', [BorrowController::class, 'index']);
Route::resource('borrows', BorrowController::class);


