<?php

namespace Database\Factories;

use App\Models\Son;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Type;
use App\Models\Style;
use App\Models\Ambiance;
use App\Models\User;

/**
 * @extends Factory<Son>
 */
class SonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->unique()->word(),
            'description' => $this->faker->sentence(),
            'style_id' => Style::inRandomOrder()->first()->id,
            'ambiance_id' => Ambiance::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
             'duration' => $this->faker->numberBetween(30, 300),
        ];
    }
}
