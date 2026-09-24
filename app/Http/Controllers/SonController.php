<?php

namespace App\Http\Controllers;
use App\Models\Son;

class SonController extends Controller
{
   public function index()
    {
        //$sons = Son::all('nom', 'url', 'created_at');
        $sons = Son::orderByDesc('created_at')->take(6)->get(['nom', 'url', 'created_at', 'duree', 'style_id', 'ambiance_id']);
        //dd($sons);
        return view('sons', compact('sons'));
    }
}
