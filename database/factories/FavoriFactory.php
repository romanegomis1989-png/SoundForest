<?php

namespace Database\Factories;

use App\Models\Favori;
use App\Models\Son;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;
use RuntimeException;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Favori>
 */
class FavoriFactory extends Factory
{
    private static ?Collection $userIds = null;
    private static ?Collection $sonIds = null;

    /** @var array<string, true> Paires "user_id-son_id" déjà utilisées */
    private static array $pairesUtilisees = [];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->initialiser();

        $maxPaires = self::$userIds->count() * self::$sonIds->count();

        if (count(self::$pairesUtilisees) >= $maxPaires) {
            throw new RuntimeException(
                "Plus aucune paire user/son disponible ({$maxPaires} combinaisons possibles)."
            );
        }

        do {
            $userId = self::$userIds->random();
            $sonId  = self::$sonIds->random();
            $cle    = $userId . '-' . $sonId;
        } while (isset(self::$pairesUtilisees[$cle]));

        self::$pairesUtilisees[$cle] = true;

        return [
            'son_id' => $sonId,
            'user_id' => $userId,
            'commentaire' => $this->faker->optional(0.2)->sentence(),
        ];
    }

    private function initialiser(): void
    {
        if (self::$userIds !== null) {
            return;
        }

        self::$userIds = User::pluck('id');
        self::$sonIds  = Son::pluck('id');

        if (self::$userIds->isEmpty() || self::$sonIds->isEmpty()) {
            throw new RuntimeException('Seeder les users et les sons avant les favoris.');
        }

        // Paires déjà présentes en base (seeder relancé sans migrate:fresh)
        Favori::query()
            ->get(['user_id', 'son_id'])
            ->each(function ($favori) {
                self::$pairesUtilisees[$favori->user_id . '-' . $favori->son_id] = true;
            });
    }
}