<?php

namespace App\Http\Controllers;
use App\Models\Son;
use App\Models\Style;
use App\Models\Ambiance;
use Illuminate\Http\Request;

class SonController extends Controller
{
   public function index(Request $request)
    {
        $sons = Son::query()
            ->orderByDesc('created_at')
            ->get(['id', 'nom', 'description', 'url', 'created_at', 'duree', 'style_id', 'ambiance_id', 'format', 'user_id']);

        $styles = Style::orderBy('nom')->get();
        $ambiances = Ambiance::orderBy('nom')->get();
        $formats = Son::formats();

        return view('sons', compact('sons', 'styles', 'ambiances', 'formats'));
    }
}
