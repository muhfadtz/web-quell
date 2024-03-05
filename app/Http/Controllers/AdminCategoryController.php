<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('dashboard.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|min:2',
            'slug' => 'required|unique:categories,slug'
        ]);
    
        $validatedData['name'] = ucwords($validatedData['name']);
        $validatedData['slug'] = Str::slug($validatedData['name']);
    
        Category::create($validatedData);
        return redirect('/dashboard/categories')->with('success', 'New Category has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Atur aturan validasi
        $rules = [
            'name' => 'required|max:255|min:2',
        ];

        // Jika perubahan slug, tambahkan aturan validasi untuk slug
        if ($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        // Validasi data menggunakan aturan yang telah ditetapkan
        $validatedData = $request->validate($rules);

        // Perbarui data post yang ada di database
        Category::where('id', $category->id)->update($validatedData);

        // Redirect ke halaman dashboard dengan pesan sukses
        return redirect('/dashboard/categories')->with('success', 'Category has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect('/dashboard/categories')->with('success', 'Category has been deleted!');
    }
}
