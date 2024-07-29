@extends('base')


@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Modifier l'Événement</h1>

        <form action="{{ route('evenements.update', $evenement->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="titre" class="block text-sm font-medium text-gray-700">Titre</label>
                <input type="text" id="titre" name="titre" value="{{ old('titre', $evenement->titre) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                @error('titre')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>{{ old('description', $evenement->description) }}</textarea>
                @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="date_debut" class="block text-sm font-medium text-gray-700">Date de début</label>
                <input type="date" id="date_debut" name="date_debut" value="{{ old('date_debut', $evenement->date_debut->format('Y-m-d')) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                @error('date_debut')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="date_fin" class="block text-sm font-medium text-gray-700">Date de fin</label>
                <input type="date" id="date_fin" name="date_fin" value="{{ old('date_fin', $evenement->date_fin) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                @error('date_fin')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="images" class="block text-sm font-medium text-gray-700">Images (vous pouvez ajouter plusieurs images)</label>
                <input type="file" id="images" name="images[]" multiple class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                @error('images')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</button>
        </form>

        <div class="mt-6">
            <h2 class="text-lg font-semibold mb-4">Images Actuelles</h2>
            @if($evenement->images->isNotEmpty())
                <div class="grid grid-cols-3 gap-4">
                    @foreach($evenement->images as $image)
                        <div class="relative">
                            <img src="{{ Storage::url($photo->chemin) }}" alt="Image" class="w-full h-auto rounded-lg">
                            <form action="{{ Storage::url($photo->chemin) }}" method="POST" class="absolute top-0 right-0 mt-2 mr-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Supprimer</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @else
                <p>Aucune image disponible pour cet événement.</p>
            @endif
        </div>
    </div>
@endsection
