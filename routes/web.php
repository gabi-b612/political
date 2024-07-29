<?php

use App\Http\Controllers\MembreController;
use App\Http\Controllers\OffreDemploiController;
use App\Http\Controllers\UserMembreController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('utilisateurs/index');
})->name('homeUser');

Route::get('/utilisateurs/register', function () {
    return view('utilisateurs.register');
})->name('showRegisterForm');

Route::post('/utilisateurs/register', [UserMembreController::class, 'store'])->name('userRegister');

Route::get('/utilisateurs/membres', [UserMembreController::class, 'index'])->name('showAllMembres');
Route::get('/utilisateurs/membres/{id}', [UserMembreController::class, 'show'])->name('showMembre');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin' , function () {
        return view('admin');
    })->name('admin');
    Route::resource('admin/utilisateurs', UtilisateurController::class);
    Route::resource('admin/membres', MembreController::class);
    Route::resource('admin/offres', OffreDemploiController::class);
});

require __DIR__.'/auth.php';
