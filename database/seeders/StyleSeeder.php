<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Style;

class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Style::create([
            'nom' => 'Relaxant',
            'description' => 'Sons apaisants pour la détente et la méditation.',
        ]);
        Style::create([
            'nom' => 'Dynamique',
            'description' => 'Sons énergiques pour stimuler l’activité.',
        ]);
        Style::create([
            'nom' => 'Naturel',
            'description' => 'Sons authentiques de la nature pour une immersion totale.',
        ]);
        Style::create([
            'nom' => 'Ambiant',
            'description' => 'Sons atmosphériques pour créer une ambiance particulière.',
        ]);
        Style::create([
            'nom' => 'Instrumental',
            'description' => 'Sons de musique instrumentale pour accompagner vos moments.',
        ]);
    }
}
