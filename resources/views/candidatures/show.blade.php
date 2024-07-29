@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Détails de la Candidature</h1>

        <div class="bg-white p-6 border border-gray-200 rounded-lg">
            <div class="mb-4">
                <strong>Nom du Candidat :</strong> {{ $candidature->nom_du_candidat }}
            </div>
            <div class="mb-4">
                <strong>Offre :</strong> {{ $candidature->offre->titre }}
            </div>
            <div class="mb-4">
                <strong>Date de Candidature :</strong> {{ $candidature->date_de_candidature }}
            </div>
            <div class="mb-4">
                <strong>Statut :</strong> {{ $candidature->statut }}
            </div>

            <a href="{{ route('candidatures.edit', $candidature->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Modifier</a>
            <form action="{{ route('candidatures.destroy', $candidature->id) }}" method="POST" class="inline-block ml-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
            </form>
            <a href="{{ route('candidatures.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mt-4 inline-block">Retour à la liste</a>
        </div>
    </div>
@endsection
