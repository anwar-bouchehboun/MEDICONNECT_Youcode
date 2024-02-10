<x-app-layout>
    <div class="flex">
        <x-sidebar/>
        <div class="container p-4 mx-auto">
            @if(session('success'))
            <div class="relative px-4 py-3 mt-2 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
            <h2 class="mb-4 text-lg font-semibold uppercase">Modifier le Médicament</h2>
            <form action="{{ route('medicament.update', $medicament->id) }}" method="POST" class="max-w-lg mx-auto">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="specialite" class="block mb-2 font-medium text-gray-700">Spécialité :</label>
                    <select name="specialite_id" id="specialite" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                        <option value="" disabled selected>Sélectionnez une spécialité</option>
                        @foreach ($specialites as $specialite)
                            <option value="{{ $specialite->id }}" {{ $medicament->specialite_id == $specialite->id ? 'selected' : '' }}>{{ $specialite->specialite }}</option>
                        @endforeach
                    </select>
                    @error('specialite_id')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="nom_medicament" class="block mb-2 font-medium text-gray-700">Nom du médicament :</label>
                    <div class="relative">
                        <input type="text" id="nom_medicament" name="medicament" value="{{ $medicament->medicament }}" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" placeholder="Entrez le nom du médicament">
                        <span class="absolute text-gray-400 transform -translate-y-1/2 right-3 top-1/2">
                            <i class="fas fa-prescription-bottle-alt"></i>
                        </span>
                    </div>
                    @error('medicament')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="w-full px-4 py-2 text-white transition duration-300 bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Mettre à jour le médicament</button>
            </form>
            <a href="{{ route('medicament.index') }}" class="w-full px-4 py-2 text-white transition duration-300 bg-red-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">FERMER</a>

        </div>




    </div>

</x-app-layout>
