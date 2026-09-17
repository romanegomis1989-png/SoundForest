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

        $populaires = Son::Take(6)->orderByDesc('popularite')->get();
        $nouveautes = Son::Take(6)->orderByDesc('created_at')->get();

        // On retourne la vue home
        return view('home', 
            compact('nbSons', 
                    'nbStyles', 
                    'nbAmbiances', 
                    'populaires',
                    'nouveautes'));
    }
}
