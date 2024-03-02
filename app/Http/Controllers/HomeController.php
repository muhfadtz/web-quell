<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = 'Category: ' . $category->name;
        }
        // Menggunakan query Post dengan filter tanpa pagination.
        $posts = Post::latest()->filter($request->only(['search']))->get();

        return view('home', compact('categories', 'posts'));
    }
}
