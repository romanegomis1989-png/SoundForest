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
            'description' => 'Sons de vagues, mouettes et ambiance marine',
        ]);
        Ambiance::create([
            'nom' => 'Forêt',
            'description' => 'Sons d’oiseaux, vent dans les arbres et ambiances forestières',
        ]);
        Ambiance::create([
            'nom' => 'Ville',
            'description' => 'Sons de circulation, klaxons et ambiances urbaines',
        ]);
        Ambiance::create([
            'nom' => 'Spatial/Espace',
            'description' => 'Sons de vaisseaux spatial, trou noir, ambiances galactiques',
        ]);
        Ambiance::create([
            'nom' => 'Campagne',
            'description' => 'Sons de cigales, ferme et ambiances campagnardes',
        ]);
        Ambiance::create([
            'nom' => 'Météo',
            'description' => 'Sons de pluie, tonnerre, vent et ambiances météorologiques',
        ]);
        Ambiance::create([
            'nom' => 'Fantastique',
            'description' => 'Sons de créatures imaginaires, sorts magiques, enchantements et ambiances féériques',
        ]);
        Ambiance::create([
            'nom' => 'Médiévale',
            'description' => 'Sons de boucliers, combats d épées, armures et ambiances chevaleresque',
        ]);
        Ambiance::create([
            'nom' => 'Horreur',
            'description' => 'Sons de portes qui grincent, chaines, rires, cris et ambiances horrifiques',
        ]);
        Ambiance::create([
            'nom' => 'Tension',
            'description' => 'Morceaux lents, montant progressivement, basse puissante, violons désaccordés stressant, ambiances sombre crescendo',
        ]);
        Ambiance::create([
            'nom' => 'Drône',
            'description' => 'Sons longs et très synthétiques, graves,idéale pour moment de suspence ou science-fiction contenant brass, pads etc',
        ]);
        Ambiance::create([
            'nom' => 'Industrielle',
            'description' => 'Sons de machines, usines, éléctricité',
        ]);
        Ambiance::create([
            'nom' => 'Soirée/fête',
            'description' => 'Sons de fête, rires, musique et ambiance joyeuse.',
        ]);
        Ambiance::create([
            'nom' => 'Concert/Match/Festival',
            'description' => 'Sons de foule, musique live et ambiance festive.',
        ]);
        Ambiance::create([
            'nom' => 'Foule/Manifestation',
            'description' => 'Sons de foule, slogans et ambiance de manifestation.',
        ]);
            Ambiance::create([
                'nom' => 'Bureau/Travail',
                'description' => 'Sons de clavier, imprimante, téléphone et ambiance de bureau.',
            ]);
            Ambiance::create([
                'nom' => 'Espace public',
                'description' => 'Sons de métro, gare, aéroport et ambiance d’espace public.',
            ]);
    }
}
