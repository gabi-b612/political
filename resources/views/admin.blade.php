@extends('base')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Tableau de Bord Administratif</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('utilisateurs.index') }}" class="bg-blue-500 text-white p-4 rounded text-center">Gérer les Utilisateurs</a>
            <a href="{{ route('membres.index') }}" class="bg-green-500 text-white p-4 rounded text-center">Gérer les Membres</a>
            <a href="{{ route('offres.index') }}" class="bg-yellow-500 text-white p-4 rounded text-center">Gérer les Offres d'Emploi</a>
        </div>
    </div>
@endsection
