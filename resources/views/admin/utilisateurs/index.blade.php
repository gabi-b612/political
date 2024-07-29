@extends('base')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Liste des Utilisateurs</h1>
        <a href="{{ route('utilisateurs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ajouter
            un utilisateur</a>

        <table class="min-w-full mt-6 bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-gray-600">Nom</th>
                <th class="px-6 py-3 text-left text-gray-600">Email</th>
                <th class="px-6 py-3 text-left text-gray-600">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($utilisateurs as $utilisateur)
                <tr class="border-b border-gray-200">
                    <td class="px-6 py-4">{{ $utilisateur->nom }}</td>
                    <td class="px-6 py-4">{{ $utilisateur->email }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('utilisateurs.show', $utilisateur->id) }}"
                           class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Voir</a>
                        <a href="{{ route('utilisateurs.edit', $utilisateur->id) }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Modifier</a>
                        <form action="{{ route('utilisateurs.destroy', $utilisateur->id) }}" method="POST"
                              class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                    onclick="return confirm('Êtes-vous sûr ?')">Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
