<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create([
            'nom' => 'Nature',
            'description' => 'Sons naturels pour une immersion totale.',
        ]);
        Type::create([
            'nom' => 'Musique',
            'description' => 'Sons musicaux pour accompagner vos moments.',
        ]);
        Type::create([
            'nom' => 'Ambiance',
            'description' => 'Sons atmosphériques pour créer une ambiance particulière.',
        ]);
        Type::create([
            'nom' => 'Relaxation',
            'description' => 'Sons apaisants pour la détente et la méditation.',
        ]);
        Type::create([
            'nom' => 'Dynamique',
            'description' => 'Sons énergiques pour stimuler l’activité.',
        ]);
    }
}
