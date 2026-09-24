<?php

namespace App\Http\Controllers;
use App\Models\Son;

class SonController extends Controller
{
   public function index()
    {
        $sons = Son::all('nom', 'url', 'created_at');
        //dd($sons);
        return view('sons', compact('sons'));
    }
}
