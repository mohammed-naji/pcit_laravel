<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
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
        // fake()->word() // cat, dog
        // fake()->words(5, true) // dd ee qq rr
        return [
            'title' => fake()->words(4, true),
            'image' => fake()->imageUrl(),
            'content' => fake()->text(100)
        ];
    }
}
