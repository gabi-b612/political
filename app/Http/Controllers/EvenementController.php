<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\PhotoEvenement;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EvenementController extends Controller
{
    public function index(): View|Factory|Application
    {
        $evenements = Evenement::with('photos')->get(); // Charger les photos avec les événements
        return view('evenements.index', compact('evenements'));
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
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $evenement = Evenement::create([
            'titre' => $request->input('titre'),
            'description' => $request->input('description'),
            'date_debut' => $request->input('date_debut'),
            'date_fin' => $request->input('date_fin'),
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photoFile) {
                $path = $photoFile->store('evenements', 'public');
                PhotoEvenement::create([
                    'evenement_id' => $evenement->id,
                    'chemin' => $path,
                ]);
            }
        }

        return redirect()->route('evenements.index')->with('success', 'Événement créé avec succès.');
    }

    public function show($id): View|Factory|Application
    {
        $evenement = Evenement::with('photos')->findOrFail($id);
        return view('evenements.show', compact('evenement'));
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
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $evenement = Evenement::findOrFail($id);
        $evenement->update([
            'titre' => $request->input('titre'),
            'description' => $request->input('description'),
            'date_debut' => $request->input('date_debut'),
            'date_fin' => $request->input('date_fin'),
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photoFile) {
                $path = $photoFile->store('evenements', 'public');
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
        $evenement->delete();
        // Supprimer toutes les photos associées
        $evenement->photos->each(function ($photo) {
            Storage::disk('public')->delete($photo->chemin);
            $photo->delete();
        });

        return redirect()->route('evenements.index')->with('success', 'Événement supprimé avec succès.');
    }

    // Méthode pour supprimer une photo spécifique
    public function destroyPhoto($id): RedirectResponse
    {
        $photo = PhotoEvenement::findOrFail($id);
        Storage::disk('public')->delete($photo->chemin);
        $photo->delete();

        return redirect()->back()->with('success', 'Photo supprimée avec succès.');
    }
}
