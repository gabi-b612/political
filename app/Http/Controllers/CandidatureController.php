<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\Offres_d_emplois;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CandidatureController extends Controller
{
    public function index(): View|Factory|Application
    {
        $candidatures = Candidature::with(['utilisateur', 'offre_d_emploi'])->get();
        return view('admin/candidatures.index', compact('candidatures'));
    }

    public function show($id): View|Factory|Application
    {
        $candidature = Candidature::with(['utilisateur', 'offre_d_emploi'])->findOrFail($id);
        return view('admin/candidatures.show', compact('candidature'));
    }

    public function create(): View|Factory|Application
    {
        $offres = Offres_d_emplois::all();
        return view('admin/candidatures.create', compact('offres'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'utilisateur_id' => 'required|exists:utilisateurs,id',
            'offre_d_emploi_id' => 'required|exists:offres_d_emploi,id',
            'lettre_de_motivation' => 'required|string',
        ]);

        Candidature::create($request->only('utilisateur_id', 'offre_d_emploi_id', 'lettre_de_motivation'));

        return redirect()->route('admin/candidatures.index')->with('success', 'Candidature soumise avec succès.');
    }

    public function destroy($id): RedirectResponse
    {
        $candidature = Candidature::findOrFail($id);
        $candidature->delete();
        return redirect()->route('admin/candidatures.index')->with('success', 'Candidature supprimée avec succès.');
    }
}
