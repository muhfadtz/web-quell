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
    $title = 'Home';

    // Memeriksa apakah ada kategori yang dipilih
    if ($request->has('category')) {
        $category = Category::firstWhere('slug', $request->category);
        $title = 'Category: ' . $category->name;

        // Memfilter posts berdasarkan kategori yang dipilih
        $posts = Post::with('category')
                     ->where('category_id', $category->id)
                     ->latest()
                     ->filter($request->only(['search']))
                     ->get();
    } else {
        // Jika tidak ada kategori yang dipilih, tampilkan semua posts
        $posts = Post::with('category')
                     ->latest()
                     ->filter($request->only(['search']))
                     ->get();
    }

    return view('home', compact('categories', 'posts'))->with('title', $title);
}


    public function showPost($slug)
    {
        $post = Post::where('slug', $slug)->with(['category'])->firstOrFail();
        $categories = Category::all();

        return view('post', compact('post', 'categories'))->with('title', 'Details');
    }

    public function list()
    {
        $posts = Post::with('category')->get();
        return view('list', compact('posts'))->with('title', 'CompareList');
    }


    public function compare(Request $request)
    {
        $postSlugs = $request->input('posts', []);

        if (count($postSlugs) != 2) {
            return redirect()->route('posts.list')->withErrors(['msg' => 'Please select exactly 2 posts to compare.']);
        }

        $posts = Post::whereIn('slug', $postSlugs)->with('category')->get();

        if (count($posts) != 2) { // Pastikan kedua post ditemukan
            return redirect()->route('posts.list')->withErrors(['msg' => 'Unable to find all selected posts.']);
        }

        return view('compare', compact('posts'))->with('title', 'Compare');
    }

    public function community(Request $request)
    {
        return view('community')->with('title', 'Community');
    }

}

