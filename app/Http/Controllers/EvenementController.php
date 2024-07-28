<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\PhotoEvenement;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    public function index(): View|Factory|Application
    {
        $evenements = Evenement::with('photos')->get();
        return view('evenements.index', compact('evenements'));
    }

    public function show($id): View|Factory|Application
    {
        $evenement = Evenement::with('photos')->findOrFail($id);
        return view('evenements.show', compact('evenement'));
    }

    public function create(): View|Factory|Application
    {
        return view('evenements.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date_de_l_evenement' => 'required|date',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validation pour les photos
        ]);

        $evenement = Evenement::create($request->only('titre', 'description', 'date_de_l_evenement'));

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('public/photos_evenements');
                PhotoEvenement::create([
                    'evenement_id' => $evenement->id,
                    'chemin' => $path,
                ]);
            }
        }

        return redirect()->route('evenements.index')->with('success', 'Événement créé avec succès.');
    }

    public function edit($id): View|Factory|Application
    {
        $evenement = Evenement::with('photos')->findOrFail($id);
        return view('evenements.edit', compact('evenement'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date_de_l_evenement' => 'required|date',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $evenement = Evenement::findOrFail($id);
        $evenement->update($request->only('titre', 'description', 'date_de_l_evenement'));

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('public/photos_evenements');
                PhotoEvenement::create([
                    'evenement_id' => $evenement->id,
                    'chemin' => $path,
                ]);
            }
        }

        return redirect()->route('evenements.index')->with('success', 'Événement mis à jour avec succès.');
    }

    public function destroy($id): RedirectResponse
    {
        $evenement = Evenement::findOrFail($id);
        $evenement->photos()->delete();
        $evenement->delete();
        return redirect()->route('evenements.index')->with('success', 'Événement supprimé avec succès.');
    }
}
