@extends('base')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Détails du Membre</h1>

        <div class="bg-white p-6 border border-gray-200 rounded-lg">
            <div class="mb-4">
                <strong>Numéro d'adhésion :</strong> {{ $membre->numero_d_adhesion }}
            </div>
            <div class="mb-4">
                <strong>Prénom :</strong> {{ $membre->prenom }}
            </div>
            <div class="mb-4">
                <strong>Nom :</strong> {{ $membre->nom }}
            </div>
            <div class="mb-4">
                <strong>Post-nom :</strong> {{ $membre->post_nom }}
            </div>
            <div class="mb-4">
                <strong>Sexe :</strong> {{ $membre->sexe }}
            </div>
            <div class="mb-4">
                <strong>Lieu de naissance :</strong> {{ $membre->lieu_de_naissance }}
            </div>
            <div class="mb-4">
                <strong>Province d'origine :</strong> {{ $membre->province_d_origine }}
            </div>
            <div class="mb-4">
                <strong>Territoire d'origine :</strong> {{ $membre->territoire_d_origine }}
            </div>
            <div class="mb-4">
                <strong>Études faites :</strong> {{ $membre->etudes }}
            </div>
            <div class="mb-4">
                <strong>Adresse :</strong> {{ $membre->adresse }}
            </div>
            <div class="mb-4">
                <strong>Téléphone :</strong> {{ $membre->telephone }}
            </div>
            <div class="mb-4">
                <strong>Photo de profil :</strong>
                @if ($membre->photo_de_profil)
                    <img src="{{ Storage::url($membre->photo_de_profil) }}" alt="Photo de profil" class="w-32 h-32 object-cover rounded-full border border-gray-300">
                @else
                    Aucune photo disponible
                @endif
            </div>

            <form action="{{ route('membres.destroy', $membre->id) }}" method="POST" class="inline-block ml-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
            </form>
            <a href="{{ route('membres.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mt-4 inline-block">Retour à la liste</a>
        </div>
    </div>
@endsection
