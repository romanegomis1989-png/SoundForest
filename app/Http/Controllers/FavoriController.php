<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Son;
use App\Models\Favori;
use Illuminate\Http\JsonResponse;


class FavoriController extends Controller
{
    public function index() : View
    {
        $sons = Son::with(['ambiance', 'style', 'user', 'favori'])->whereIn('id', Favori::where('user_id', 2)->select('son_id')) ->get();

        return(view('favoris', compact('sons')));
    }

    public function toggle(Son $son) : JsonResponse
    {
        // On recherche un favori avec le user connecté et le son demandé
        $favori = Favori::where('user_id', Auth::id())
            ->where('son_id', $son->id)
            ->first();

        // Si on a trouvé le favori
        if ($favori) {
            // On le supprime
            $favori->delete();
            $estFavori = false;           
        }
        // Si on a pas trouvé le favori
        else {
            // On le crée
            Favori::create([
                'user_id' => Auth::id(),
                'son_id'  => $son->id,
            ]);
            $estFavori = true;
        }
        
        return response()->json(['favori' => $estFavori]);
    }
}
