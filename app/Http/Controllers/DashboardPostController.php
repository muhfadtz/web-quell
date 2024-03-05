<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255|min:4',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:2048',
            'seri_laptop' => 'required|min:4',
            'processor' => 'required|min:4',
            'graphic_card' => 'required|min:4',
            'ram' => 'required|min:4',
            'storage' => 'required|min:4',
            'port' => 'required|min:4',
            'os' => 'required|min:4',
            'price' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 28, '...');

        Post::create($validatedData);
        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'posts' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Atur aturan validasi
        $rules = [
            'title' => 'required|max:255|min:4',
            'category_id' => 'required',
            'image' => 'image|file|max:2048',
            'seri_laptop' => 'required|min:4',
            'processor' => 'required|min:4',
            'graphic_card' => 'required|min:4',
            'ram' => 'required|min:4',
            'storage' => 'required|min:4',
            'port' => 'required|min:4',
            'os' => 'required|min:4',
            'price' => 'required'
        ];

        // Jika file gambar diunggah, tambahkan aturan validasi untuk gambar
        if ($request->file('image')) {
            // Hapus aturan validasi gambar yang sudah ada
            unset($rules['image']);
            // Tambahkan aturan validasi baru untuk gambar
            $rules['new_image'] = 'image|file';
        }

        // Jika perubahan slug, tambahkan aturan validasi untuk slug
        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        // Validasi data menggunakan aturan yang telah ditetapkan
        $validatedData = $request->validate($rules);

        // Jika file gambar baru diunggah
        if ($request->file('image')) {
            // Periksa ukuran file secara manual
            $maxFileSize = 2048; // Ukuran dalam KB
            $fileSize = $request->file('image')->getSize() / 1024; // Konversi ukuran file ke KB

            if ($fileSize > $maxFileSize) {
                // Ukuran file melebihi batas
                return redirect()->back()->withInput()->withErrors(['image' => 'Warning: File must be max: 2Mb.']);
            }

            // Hapus gambar lama jika ada
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            // Simpan gambar baru ke dalam direktori 'post-images'
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        // Tambahkan informasi tambahan ke dalam data yang divalidasi
        $validatedData['user_id'] = auth()->user()->id;

        // Perbarui data post yang ada di database
        Post::where('id', $post->id)->update($validatedData);

        // Redirect ke halaman dashboard dengan pesan sukses
        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }

        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }

    public function checkSlug(Request $request) {

        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
