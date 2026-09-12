<?php

namespace Database\Factories;

use App\Models\Identity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Identity>
 */
class IdentityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_num' => rand(000000000, 999999999),
            'release_date' => now(),
            'expire_date' => now(),
            'user_id' => fake()->unique()->numberBetween(0, 10)
        ];
    }
}
