<?php

use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\OffreDemploiController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin' , function () {
        return view('admin');
    })->name('admin');
    Route::resource('admin/utilisateurs', UtilisateurController::class);
    Route::resource('admin/membres', MembreController::class);
    Route::resource('admin/offres', OffreDemploiController::class);
//    Route::resource('candidatures', CandidatureController::class);
//    Route::get('candidatures/{id}/destroy', [CandidatureController::class, 'destroy'])->name('candidatures.destroy');
//    Route::delete('candidatures/{id}', [CandidatureController::class, 'destroyConfirmed'])->name('candidatures.destroyConfirmed');
});

require __DIR__.'/auth.php';
