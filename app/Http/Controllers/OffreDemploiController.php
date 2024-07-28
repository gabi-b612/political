<?php

namespace App\Http\Controllers;

use App\Models\Offre_d_emploi;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OffreDemploiController extends Controller
{
    public function index(): View|Factory|Application
    {
        $offres = Offre_d_emploi::all();
        return view('offres.index', compact('offres'));
    }

    public function show($id): View|Factory|Application
    {
        $offre = Offre_d_emploi::findOrFail($id);
        return view('offres.show', compact('offre'));
    }

    public function create(): View|Factory|Application
    {
        return view('offres.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date_limite_de_candidature' => 'required|date',
        ]);

        Offre_d_emploi::create($request->only('titre', 'description', 'date_limite_de_candidature'));

        return redirect()->route('offres.index')->with('success', 'Offre d\'emploi créée avec succès.');
    }

    public function edit($id): View|Factory|Application
    {
        $offre = Offre_d_emploi::findOrFail($id);
        return view('offres.edit', compact('offre'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date_limite_de_candidature' => 'required|date',
        ]);

        $offre = Offre_d_emploi::findOrFail($id);
        $offre->update($request->only('titre', 'description', 'date_limite_de_candidature'));

        return redirect()->route('offres.index')->with('success', 'Offre d\'emploi mise à jour avec succès.');
    }

    public function destroy($id): RedirectResponse
    {
        $offre = Offre_d_emploi::findOrFail($id);
        $offre->delete();
        return redirect()->route('offres.index')->with('success', 'Offre d\'emploi supprimée avec succès.');
    }
}
