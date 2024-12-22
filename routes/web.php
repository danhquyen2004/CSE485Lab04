<?php


use App\Http\Controllers\ReaderController;
use Illuminate\Support\Facades\Route;


Route::resource('readers',ReaderController::class);
