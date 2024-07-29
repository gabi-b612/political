<!-- resources/views/utilisateurs/profil.blade.php -->

@extends('base')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Profil du Membre</h1>

        <div class="bg-white shadow-md rounded p-6">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Numéro d'adhésion:</label>
                <p>{{ $membre->numero_d_adhesion }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Prénom:</label>
                <p>{{ $membre->prenom }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nom:</label>
                <p>{{ $membre->nom }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Post-nom:</label>
                <p>{{ $membre->post_nom }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Sexe:</label>
                <p>{{ $membre->sexe }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Lieu de naissance:</label>
                <p>{{ $membre->lieu_de_naissance }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Province d'origine:</label>
                <p>{{ $membre->province_d_origine }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Territoire d'origine:</label>
                <p>{{ $membre->territoire_d_origine }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Études:</label>
                <p>{{ $membre->etudes }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Adresse:</label>
                <p>{{ $membre->adresse }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Téléphone:</label>
                <p>{{ $membre->telephone }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Photo de profil:</label>
                <img src="{{ Storage::url($membre->photo_de_profil) }}" alt="Photo de profil" class="w-24 h-24 rounded-full">
            </div>
        </div>
    </div>
@endsection
