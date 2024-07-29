@extends('base')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Liste des Candidatures</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-200">
            <thead>
            <tr>
                <th class="py-2 px-4 border-b">Nom du Candidat</th>
                <th class="py-2 px-4 border-b">Offre</th>
                <th class="py-2 px-4 border-b">Date de Candidature</th>
                <th class="py-2 px-4 border-b">Statut</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($candidatures as $candidature)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $candidature->nom_du_candidat }}</td>
                    <td class="py-2 px-4 border-b">{{ $candidature->offre->titre }}</td>
                    <td class="py-2 px-4 border-b">{{ $candidature->date_de_candidature }}</td>
                    <td class="py-2 px-4 border-b">{{ $candidature->statut }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('candidatures.show', $candidature->id) }}" class="text-blue-500 hover:underline">Voir</a>
                        <a href="{{ route('candidatures.edit', $candidature->id) }}" class="text-yellow-500 hover:underline ml-2">Modifier</a>
                        <form action="{{ route('candidatures.destroy', $candidature->id) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
