<x-app-layout>

    <div class="flex">
<x-sidebar/>
        <div class="flex flex-col w-full h-screen overflow-y-hidden">
            @if(session('success'))
            <div class="relative px-4 py-3 mt-2 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif


            <div id="popup" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
              <div class="max-w-md p-8 mx-3 bg-white rounded shadow-md">
                <h2 class="mb-4 text-xl font-semibold">Formulaire d'insertion de spécialité professionnelle</h2>
                <form action="{{ route('specialite.update', $specialite->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="specialite" class="block mb-2 font-medium text-gray-700">Spécialité professionnelle :</label>
                        <input type="text" id="specialite" name="specialite" value="{{ $specialite->specialite }}" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" placeholder="Entrez votre spécialité professionnelle">
                    </div>
                    <button type="submit" class="px-4 py-2 mb-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Update Product</button>
                </form>

                <a href="{{ route('specialite.index') }}"  id="fermerPopup" class="px-4 py-2 mt-4 text-white bg-red-500 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">Fermer</a>
              </div>
            </div>


        </div>
    </div>


</x-app-layout>
