<?php

namespace App\Http\Controllers;
use App\Models\Son;
use App\Models\Style;
use App\Models\Ambiance;

class HomeController extends Controller
{
    public function index()
    {
        // Récupération du nombre de sons, styles et ambiances au moyen des modèles
        $nbSons = Son::count();
        $nbStyles = Style::count();
        $nbAmbiances = Ambiance::count();

        // On retourne la vue home
        return view('home', compact('nbSons', 'nbStyles', 'nbAmbiances'));
    }
}
