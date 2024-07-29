@extends('base')


@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Liste des Événements</h1>
        <a href="{{ route('evenements.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Ajouter un Événement</a>

        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-200">
            <thead>
            <tr>
                <th class="py-2 px-4 border-b">Titre</th>
                <th class="py-2 px-4 border-b">Description</th>
                <th class="py-2 px-4 border-b">Date</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($evenements as $evenement)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $evenement->titre }}</td>
                    <td class="py-2 px-4 border-b">{{ Str::limit($evenement->description, 50) }}</td>
                    <td class="py-2 px-4 border-b">{{ $evenement->date_debut}}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('evenements.show', $evenement->id) }}" class="text-blue-500 hover:underline">Voir</a>
                        <a href="{{ route('evenements.edit', $evenement->id) }}" class="text-yellow-500 hover:underline ml-2">Modifier</a>
                        <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST" class="inline-block ml-2">
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
