<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController;

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


// Main
Route::get('/', function () {
    return view('home');
});

// Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Content
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/post/{slug}', [HomeController::class, 'showPost'])->name('post.show');

// Administrator
Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware(['auth', 'admin']);


Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware(['auth', 'admin']);;

Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware(['auth', 'admin']);;
// Route::get('posts/{post:slug}', [HomeController::class, 'show'])->name('posts');
// Route::get('posts/{post:slug}', [HomeController::class, 'show']);
// Route::get('/', [CategoryController::class, 'index'])->name('home');
// Route::get('/', [PostController::class, 'index'])->name('home');