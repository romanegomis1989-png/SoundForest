<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
