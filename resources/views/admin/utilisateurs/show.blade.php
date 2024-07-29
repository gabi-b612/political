@extends('base')
@section('title', 'Utilisateur')
@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Détails de l'Utilisateur</h1>

        <div class="bg-white p-6 border border-gray-200 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">{{ $utilisateur->nom }}</h2>
            <p><strong>Email:</strong> {{ $utilisateur->email }}</p>
            <div class="mt-4">
                <strong>Photo de Profil:</strong>
                <div class="mt-2">
                    <img src="{{ Storage::url($utilisateur->photo_de_profil) }}" alt="Photo de Profil" class="w-32 h-32 object-cover rounded-full border border-gray-300">
                </div>
            </div>
        </div>

        <a href="{{ route('utilisateurs.index') }}" class="mt-6 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Retour à la liste</a>
    </div>
@endsection
