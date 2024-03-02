<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// File: routes/web.php



Route::get('/', [HomeController::class, 'index'])->name('home');


// Route::get('/', [CategoryController::class, 'index'])->name('home');
// Route::get('/', [PostController::class, 'index'])->name('home');