<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{
    public function index(): View|Factory|Application
    {
        $utilisateurs = Utilisateur::all();
        return view('admin.utilisateurs.index', compact('utilisateurs'));
    }

    public function show($id): View|Factory|Application
    {
        $utilisateur = Utilisateur::findOrFail($id);
        return view('admin.utilisateurs.show', compact('utilisateur'));
    }

    public function create(): View|Factory|Application
    {
        return view('admin.utilisateurs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs',
            'mot_de_passe' => 'required|string|min:8',
            'photo_de_profil' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $photoPath = $request->file('photo_de_profil')->store('public/photos_utilisateurs');

        Utilisateur::create([
            'nom' => $request->input('nom'),
            'email' => $request->input('email'),
            'mot_de_passe' => Hash::make($request->input('mot_de_passe')),
            'photo_de_profil' => $photoPath,
        ]);

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function edit($id): View|Factory|Application
    {
        $utilisateur = Utilisateur::findOrFail($id);
        return view('admin/utilisateurs.edit', compact('utilisateur'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email,' . $id,
            'mot_de_passe' => 'nullable|string|min:8',
            'photo_de_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $utilisateur = Utilisateur::findOrFail($id);

        if ($request->hasFile('photo_de_profil')) {
            $photoPath = $request->file('photo_de_profil')->store('public/photos_utilisateurs');
            $utilisateur->photo_de_profil = $photoPath;
        }

        $utilisateur->update([
            'nom' => $request->input('nom'),
            'email' => $request->input('email'),
            'mot_de_passe' => $request->input('mot_de_passe') ? Hash::make($request->input('mot_de_passe')) : $utilisateur->mot_de_passe,
        ]);

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy($id): RedirectResponse
    {
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->delete();
        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
