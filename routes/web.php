<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SonController;
use Illuminate\Support\Facades\Route;
use App\Models\Son;
use App\Models\Style;
use App\Models\Ambiance;


//Accès à la racine de l'application
Route::get('/', 
    function () {
        $nbSons = Son::count();
        $nbStyles = Style::count();
        $nbAmbiances = Ambiance::count();
        return view('home',['nbSons' => $nbSons, 'nbStyles'=>$nbStyles, 'nbAmbiances'=>$nbAmbiances]);
    }
)->name('home');

Route::get('/sons', [SonController::class, 'index']);
Route::get('son', function() {return view('son');});
Route::get('/wavesurfer', function() {return view('wavesurfer');});
Route::get('/mentions', function() {return view('mentions');});
Route::get('/test', function() {return view('test');})->name('test');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
