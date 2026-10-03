<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class QuiSommesNousController extends Controller
{
    public function index() : View
    {
        return view('qui-sommes-nous');
    }
}
