<?php
namespace App\Http\Controllers;

use App\Models\Membre;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserMembreController extends Controller
{
    public function index(): View|Factory|Application
    {
        $membres = Membre::all();
        return view('utilisateurs.profils', compact('membres'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'numero_d_adhesion' => 'required|string|unique:membres',
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'post_nom' => 'nullable|string|max:255',
            'sexe' => 'required|in:F,M',
            'lieu_de_naissance' => 'required|string|max:255',
            'province_d_origine' => 'required|string|max:255',
            'territoire_d_origine' => 'required|string|max:255',
            'etudes' => 'required|string',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:15',
            'photo_de_profil' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $photoPath = $request->file('photo_de_profil')->store('public/photos_membres');

        Membre::create([
            'numero_d_adhesion' => $request->input('numero_d_adhesion'),
            'prenom' => $request->input('prenom'),
            'nom' => $request->input('nom'),
            'post_nom' => $request->input('post_nom'),
            'sexe' => $request->input('sexe'),
            'lieu_de_naissance' => $request->input('lieu_de_naissance'),
            'province_d_origine' => $request->input('province_d_origine'),
            'territoire_d_origine' => $request->input('territoire_d_origine'),
            'etudes' => $request->input('etudes'),
            'adresse' => $request->input('adresse'),
            'telephone' => $request->input('telephone'),
            'photo_de_profil' => $photoPath,
        ]);

        return redirect()->route('showAllMembres')->with('success', 'Membre créé avec succès.');
    }

    public function show($id): View|Factory|Application
    {
        $membre = Membre::findOrFail($id);
        return view('utilisateurs.profil', compact('membre'));
    }
}
