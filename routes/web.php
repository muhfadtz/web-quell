<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\CompareController;

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

//compare
Route::get('/posts/list', [HomeController::class, 'list'])->name('posts.list')->middleware('guest');
Route::get('/compare', [HomeController::class, 'compare'])->name('compare')->middleware('guest');

//Community
// Route::get('/community', [HomeController::class, 'community'])->name('comments')->middleware('guest');
// Route::get('/community', function () {
//     return view('community');
// });

// Administrator
Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware(['auth', 'admin']);

//Questions
Route::resource('questions', QuestionsController::class)->except('show');
Route::get('/questions/index', [QuestionsController::class, 'index'])->name('questions.index');
Route::get('/questions', 'QuestionsController@indexPage');
Route::get('/questions/list', 'QuestionsController@index');
Route::get('/questions/{question}', 'QuestionsController@show')->name('questions.show');
Route::get('/questions', [QuestionsController::class, 'index']);
// Answer
Route::post('/answers', [AnswerController::class, 'store'])->name('answers.store');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware(['auth', 'admin']);;

Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware(['auth', 'admin']);;
// Route::get('posts/{post:slug}', [HomeController::class, 'show'])->name('posts');
// Route::get('posts/{post:slug}', [HomeController::class, 'show']);
// Route::get('/', [CategoryController::class, 'index'])->name('home');
// Route::get('/', [PostController::class, 'index'])->name('home');