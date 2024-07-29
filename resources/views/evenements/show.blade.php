@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Détails de l'Événement</h1>

        <div class="bg-white p-6 border border-gray-200 rounded-lg">
            <div class="mb-4">
                <strong>Titre :</strong> {{ $evenement->titre }}
            </div>
            <div class="mb-4">
                <strong>Description :</strong> {{ $evenement->description }}
            </div>
            <div class="mb-4">
                <strong>Date :</strong> {{ $evenement->date}}
            </div>

            <h2 class="text-xl font-bold mb-4">Photos de l'Événement</h2>
            <div class="grid grid-cols-3 gap-4 mb-4">
                @foreach($evenement->photos as $photo)
                    <div>
                        <img src="{{Storage::url($photo->chemin) }}" alt="Photo de l'événement" class="w-full h-auto object-cover rounded">
                    </div>
                @endforeach
            </div>

            <a href="{{ route('evenements.edit', $evenement->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Modifier</a>
            <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST" class="inline-block ml-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
            </form>
            <a href="{{ route('evenements.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Retour à la liste</a>
        </div>
    </div>
@endsection
