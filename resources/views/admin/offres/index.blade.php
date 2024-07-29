@extends('base')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Liste des Offres d'Emploi</h1>
        <a href="{{ route('offres.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Ajouter une Offre</a>

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
                <th class="py-2 px-4 border-b">Date de publication</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($offres as $offre)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $offre->titre }}</td>
                    <td class="py-2 px-4 border-b">{{ Str::limit($offre->description, 50) }}</td>
                    <td class="py-2 px-4 border-b">{{ $offre->date_de_publication }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('offres.show', $offre->id) }}" class="text-blue-500 hover:underline">Voir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
