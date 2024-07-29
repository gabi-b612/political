<?php

use App\Http\Controllers\MembreController;
use App\Http\Controllers\OffreDemploiController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin' , function () {
        return view('admin');
    })->name('admin');
    Route::resource('admin/utilisateurs', UtilisateurController::class);
    Route::resource('admin/membres', MembreController::class);
    Route::resource('admin/offres', OffreDemploiController::class);
});

require __DIR__.'/auth.php';
