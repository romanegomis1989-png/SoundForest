<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Son;
use App\Models\Avis;

class AvisSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $sons  = Son::all();

        foreach ($users as $user) {
            // Chaque user note entre 1 et 3 sons au hasard
            $sons->random(min(rand(1, 3), $sons->count()))
                 ->each(function ($son) use ($user) {
                     Avis::factory()->create([
                         'user_id' => $user->id,
                         'son_id'  => $son->id,
                     ]);
                 });
        }
    }
}