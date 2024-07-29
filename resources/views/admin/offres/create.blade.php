@extends('base')


@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Ajouter une Offre d'Emploi</h1>

        <form action="{{ route('offres.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="titre" class="block text-sm font-medium text-gray-700">Titre</label>
                <input type="text" id="titre" name="titre" value="{{ old('titre') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                @error('titre')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>{{ old('description') }}</textarea>
                @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="date_limite_de_candidature" class="block text-sm font-medium text-gray-700">Date de Limite de Candidature</label>
                <input type="date" id="date_limite_de_candidature" name="date_limite_de_candidature" value="{{ old('date_limite_de_candidature') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                @error('date_limite_de_candidature')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Enregistrer</button>
        </form>
    </div>
@endsection

