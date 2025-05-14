<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;


Route::get('/', [BookController::class, 'index'])->name('index');