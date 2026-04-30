<?php

namespace Database\Factories;

use App\Models\Avis;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Son;
use App\Models\User;

/**
 * @extends Factory<Avis>
 */
class AvisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'avis' => $this->faker->sentence(),
            'note' => $this->faker->numberBetween(1, 5),
             'son_id' => Son::inRandomOrder()->first()->id,
             'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
