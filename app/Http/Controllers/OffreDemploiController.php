<?php

namespace App\Http\Controllers;


use App\Models\Offres_d_emplois;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OffreDemploiController extends Controller
{
    public function index(): View|Factory|Application
    {
        $offres = Offres_d_emplois::all();
        return view('admin.offres.index', compact('offres'));
    }

    public function show($id): View|Factory|Application
    {
        $offre = Offres_d_emplois::findOrFail($id);
        return view('admin.offres.show', compact('offre'));
    }

    public function create(): View|Factory|Application
    {
        return view('admin.offres.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date_limite_de_candidature' => 'required|date',
        ]);

        Offres_d_emplois::create($request->all());

        return redirect()->route('offres.index')->with('success', 'Offre d\'emploi créée avec succès.');
    }

    public function edit($id): View|Factory|Application
    {
        $offre = Offres_d_emplois::findOrFail($id);
        return view('admin/offres.edit', compact('offre'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date_limite_de_candidature' => 'required|date',
        ]);

        $offre = Offres_d_emplois::findOrFail($id);
        $offre->update($request->only('titre', 'description', 'date_limite_de_candidature'));
        return redirect()->route('offres.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy($id): RedirectResponse
    {
        $offre = Offres_d_emplois::findOrFail($id);
        $offre->delete();
        return redirect()->route('offres.index')->with('success', 'Offre d\'emploi supprimée avec succès.');
    }
}
