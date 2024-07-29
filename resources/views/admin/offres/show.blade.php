@extends('base')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Détails de l'Offre d'Emploi</h1>

        <div class="bg-white p-6 border border-gray-200 rounded-lg">
            <div class="mb-4">
                <strong>Titre :</strong> {{ $offre->titre }}
            </div>
            <div class="mb-4">
                <strong>Description :</strong> {{ $offre->description }}
            </div>
            <div class="mb-4">
                <strong>Date de publication :</strong> {{ $offre->date_de_publication }}
            </div>

            <a href="{{ route('offres.edit', $offre->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Modifier</a>

            <form action="{{ route('offres.destroy', $offre->id) }}" method="POST" class="inline-block ml-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
            </form>

            <a href="{{ route('offres.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mt-4 inline-block">Retour à la liste</a>

{{--            <!-- Bouton Postuler -->--}}
{{--            @auth--}}
{{--                <form action="{{ route('admin/candidatures.store') }}" method="POST" class="mt-4">--}}
{{--                    @csrf--}}
{{--                    <input type="hidden" name="offre_id" value="{{ $offre->id }}">--}}
{{--                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Postuler à cette offre</button>--}}
{{--                </form>--}}
{{--            @else--}}
{{--                <p class="mt-4 text-red-500">Vous devez être connecté pour postuler.</p>--}}
{{--            @endauth--}}
        </div>
    </div>
@endsection
