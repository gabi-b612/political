@extends('base')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Modifier l'Utilisateur</h1>

        <form action="{{ route('utilisateurs.update', $utilisateur->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 border border-gray-200 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nom" class="block text-gray-700 font-semibold mb-2">Nom</label>
                <input type="text" name="nom" id="nom" class="w-full border border-gray-300 p-2 rounded" value="{{ $utilisateur->nom }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" name="email" id="email" class="w-full border border-gray-300 p-2 rounded" value="{{ $utilisateur->email }}" required>
            </div>

            <div class="mb-4">
                <label for="mot_de_passe" class="block text-gray-700 font-semibold mb-2">Mot de Passe (laisser vide pour ne pas changer)</label>
                <input type="password" name="mot_de_passe" id="mot_de_passe" class="w-full border border-gray-300 p-2 rounded">
            </div>

            <div class="mb-4">
                <label for="photo_de_profil" class="block text-gray-700 font-semibold mb-2">Photo de Profil</label>
                <input type="file" name="photo_de_profil" id="photo_de_profil" class="w-full border border-gray-300 p-2 rounded">
                @if ($utilisateur->photo_de_profil)
                    <img src="{{ Storage::url($utilisateur->photo_de_profil) }}" alt="Photo de Profil" class="w-32 h-32 object-cover rounded-full border border-gray-300 mt-2">
                @endif
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enregistrer</button>
        </form>

        <a href="{{ route('utilisateurs.index') }}" class="mt-6 inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Retour à la liste</a>
    </div>
@endsection
