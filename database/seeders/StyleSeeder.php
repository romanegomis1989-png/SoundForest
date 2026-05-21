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
            'nom' => 'Musicaux',
            'description' => 'Morceaux de musique libres de droits contenant plusieurs sous styles (rock, jazz, classique, etc).',
        ]);
        Style::create([
            'nom' => 'Cinématiques',
            'description' => 'Sons/effets sonores puissants et épiques (impacts, transitions, woosh, etc) étant souvent utilisés pour des bandes annonces.',
        ]);
        Style::create([
            'nom' => 'Dessins animés',
            'description' => 'Sons et bruitages sortant tout droit de dessins animés pour un style cartoon, goofy et exagéré.',
        ]);
        Style::create([
            'nom' => 'Jeux vidéos',
            'description' => 'Sons et bruitages provenant de jeux vidéos, tout type de jeux vidéos confondus',
        ]);
        Style::create([
            'nom' => 'Jingles',
            'description' => 'Morceaux de musique ne dépassant pas 1 minute, idéal pour des publicités, intros, outros et reportages',
        ]);
                Style::create([
            'nom' => 'Mécaniques',
            'description' => 'Sons et bruitages très industriels, provenant de vehicules, robots ou même usines',
        ]);
                Style::create([
            'nom' => 'Humains',
            'description' => 'Sons et bruitages produits par un humain (homme, femme, enfant)',
        ]);
                Style::create([
            'nom' => 'Animaux',
            'description' => 'Sons et bruitages produits par un animal (sauvage, domestique)',
        ]);
                Style::create([
            'nom' => 'Informatique/Numérique',
            'description' => 'Sons provenant des outils informatique (bug, notifications, glitch, virus, alarmes etc).',
        ]);
    }
}
