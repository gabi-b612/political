@extends('base')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Modifier le Membre</h1>

        <form action="{{ route('membres.update', $membre->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Include all fields as in the create view, pre-populated with existing data -->
            <div class="mb-4">
                <label for="numero_d_adhesion" class="block text-sm font-medium text-gray-700">Numéro d'adhésion</label>
                <input type="text" id="numero_d_adhesion" name="numero_d_adhesion" value="{{ old('numero_d_adhesion', $membre->numero_d_adhesion) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                @error('numero_d_adhesion')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Repeat for other fields -->

            <div class="mb-4">
                <label for="photo_de_profil" class="block text-sm font-medium text-gray-700">Photo de profil</label>
                <input type="file" id="photo_de_profil" name="photo_de_profil" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                @error('photo_de_profil')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                @if ($membre->photo_de_profil)
                    <img src="{{ Storage::url($membre->photo_de_profil) }}" alt="Photo de profil" class="mt-4 w-24 h-24 object-cover rounded">
                @endif
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</button>
        </form>
    </div>
@endsection
