<?php

namespace App\Http\Controllers;

use App\Models\PhotoEvenement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PhotoEvenementController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'evenement_id' => 'required|exists:evenements,id',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('photo')->store('public/photos_evenements');

        PhotoEvenement::create([
            'evenement_id' => $request->input('evenement_id'),
            'chemin' => $path,
        ]);

        return redirect()->back()->with('success', 'Photo ajoutée avec succès.');
    }

    public function destroy($id): RedirectResponse
    {
        $photo = PhotoEvenement::findOrFail($id);
        $photo->delete();
        return redirect()->back()->with('success', 'Photo supprimée avec succès.');
    }
}
