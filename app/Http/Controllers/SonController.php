<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Son;

class SonController extends Controller
{
    public function index()
    {
        $sons = Son::all();
        return view('sons', ['sons' => $sons]);
    }
}
