<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use function PHPSTORM_META\map;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(mt_rand(2,5)),
            'slug' => fake()->slug(),
            // 'body' => fake()->paragraph(mt_rand(5,10)),
            'user_id' => mt_rand(1,5),
            'category_id' => mt_rand(1,4)
        ];
    }
}
