<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Son;

class SonController extends Controller
{
    public function index()
    {
        /*$sons = collect(Storage::disk('public')->files('Sons'))
            ->filter(fn ($f) => preg_match('/\.(mp3|wav|ogg|m4a)$/i', $f))
            ->map(fn ($f) => [
                'titre' => basename($f),
                'url'   => Storage::url($f),
            ])
            ->values();
        */
        

        $sons = Son::all('nom', 'url');
        
        return view('sons', compact('sons'));
    }
}
