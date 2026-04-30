<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ambiance;

class AmbianceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ambiance::create([
            'nom' => 'Plage',
            'description' => 'Sons de vagues, mouettes et ambiance marine.',
        ]);
        Ambiance::create([
            'nom' => 'Forêt',
            'description' => 'Sons d’oiseaux, vent dans les arbres et ambiance forestière.',
        ]);
        Ambiance::create([
            'nom' => 'Ville',
            'description' => 'Sons de circulation, klaxons et ambiance urbaine.',
        ]);
        Ambiance::create([
            'nom' => 'Montagne',
            'description' => 'Sons de vent fort, échos et ambiance montagnarde.',
        ]);
        Ambiance::create([
            'nom' => 'Pluie',
            'description' => 'Sons de pluie, gouttes et ambiance apaisante.',
        ]);
    }
}
