@extends('base')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Modifier la Candidature</h1>

        <form action="{{ route('candidatures.update', $candidature->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nom_du_candidat" class="block text-sm font-medium text-gray-700">Nom du Candidat</label>
                <input type="text" id="nom_du_candidat" name="nom_du_candidat" value="{{ old('nom_du_candidat', $candidature->nom_du_candidat) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                @error('nom_du_candidat')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="offre_id" class="block text-sm font-medium text-gray-700">Offre</label>
                <select id="offre_id" name="offre_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                    @foreach($offres as $offre)
                        <option value="{{ $offre->id }}" {{ old('offre_id', $candidature->offre_id) == $offre->id ? 'selected' : '' }}>
                            {{ $offre->titre }}
                        </option>
                    @endforeach
                </select>
                @error('offre_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="date_de_candidature" class="block text-sm font-medium text-gray-700">Date de candidature</label>
                <input type="date" id="date_de_candidature" name="date_de_candidature" value="{{ old('date_de_candidature', $candidature->date_de_candidature }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                @error('date_de_candidature')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="statut" class="block text-sm font-medium text-gray-700">Statut</label>
                <select id="statut" name="statut" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                    <option value="En attente" {{ old('statut', $candidature->statut) == 'En attente' ? 'selected' : '' }}>En attente</option>
                    <option value="Acceptée" {{ old('statut', $candidature->statut) == 'Acceptée' ? 'selected' : '' }}>Acceptée</option>
                    <option value="Rejetée" {{ old('statut', $candidature->statut) == 'Rejetée' ? 'selected' : '' }}>Rejetée</option>
                </select>
                @error('statut')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</button>
        </form>
    </div>
@endsection
