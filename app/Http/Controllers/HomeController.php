<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = 'Category: ' . $category->name;
        }
        
        // Menggunakan query Post dengan eager loading untuk 'category'
        $posts = Post::with(['category'])->latest()->filter($request->only(['search']))->get();

        return view('home', compact('categories', 'posts'));
    }

    public function showPost($slug)
    {
        $post = Post::where('slug', $slug)->with(['category'])->firstOrFail();
        $categories = Category::all();

        return view('post', compact('post', 'categories'));
    }
}

