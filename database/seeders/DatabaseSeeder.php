<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();
        Post::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::create([
            'name' => 'Asus',
            'slug' => 'asus'
        ]);

        Category::create([
            'name' => 'Acer',
            'slug' => 'acer'
        ]);

        Category::create([
            'name' => 'Lenovo',
            'slug' => 'lenovo'
        ]);

        Category::create([
            'name' => 'MSI',
            'slug' => 'msi'
        ]);
    }
}
