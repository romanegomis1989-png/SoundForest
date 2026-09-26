<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

//Accès à la racine de l'application
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sons', [SonController::class, 'index'])->name('sons.index');
Route::get('/wavesurfer', function() {return view('wavesurfer');});
Route::get('/mentions', function() {return view('mentions');});
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
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
