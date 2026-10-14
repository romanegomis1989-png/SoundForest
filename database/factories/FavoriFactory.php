<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Favori;
use App\Models\Son;
use App\Models\User;

/**
 * @extends Factory<Favori>
 */
class FavoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'son_id' => Son::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'commentaire' => $this->faker->optional(0.2)->sentence(),
        ];
    }
}
