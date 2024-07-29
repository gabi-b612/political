@extends('base')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Liste des Membres</h1>
        <a href="{{ route('membres.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Ajouter un Membre</a>

        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-200">
            <thead>
            <tr>
                <th class="py-2 px-4 border-b">Numéro d'adhésion</th>
                <th class="py-2 px-4 border-b">Prénom</th>
                <th class="py-2 px-4 border-b">Nom</th>
                <th class="py-2 px-4 border-b">Post-nom</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($membres as $membre)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $membre->numero_d_adhesion }}</td>
                    <td class="py-2 px-4 border-b">{{ $membre->prenom }}</td>
                    <td class="py-2 px-4 border-b">{{ $membre->nom }}</td>
                    <td class="py-2 px-4 border-b">{{ $membre->post_nom }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('membres.show', $membre->id) }}" class="text-blue-500 hover:underline">Voir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
