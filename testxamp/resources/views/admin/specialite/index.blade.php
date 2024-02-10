<x-app-layout>
    <style>

        #popup.hidden {
  display: none;
}
    </style>
    <div class="flex">
<x-sidebar/>
        <div class="flex flex-col w-full h-screen overflow-y-hidden">
            @if(session('success'))
            <div class="relative px-4 py-3 mt-2 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
            <button id="ouvrirPopup" class="w-20 px-4 py-2 mx-2 mt-4 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Add</button>


            <div id="popup" class="fixed inset-0 flex items-center justify-center hidden bg-gray-900 bg-opacity-50">
              <div class="max-w-md p-8 mx-3 bg-white rounded shadow-md">
                <h2 class="mb-4 text-xl font-semibold">Formulaire d'insertion de spécialité professionnelle</h2>
                <form action="{{ route('specialite.store') }}" method="post">
                    @csrf
                  <div class="mb-4">
                    <label for="specialite" class="block mb-2 font-medium text-gray-700">Spécialité professionnelle :</label>
                    <input type="text" id="specialite" name="specialite" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" placeholder="Entrez votre spécialité professionnelle">
                  </div>
                  <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Add </button>
                </form>
                <button id="fermerPopup" class="px-4 py-2 mt-4 text-white bg-red-500 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">Fermer</button>
              </div>
            </div>



            <div class="w-full mt-12">
                <h2 class="text-4xl font-semibold text-gray-700 uppercase ms-2">Specialite</h2>
                <div class="mx-2 mt-4 overflow-auto bg-white">
                    <table class="min-w-full mb-2 bg-white">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-blue-500 uppercase bg-blue-100 border-b border-gray-300">ID</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-blue-500 uppercase bg-blue-100 border-b border-gray-300">Specialite</th>
                                <th class="px-6 py-3 bg-blue-100 border-b border-gray-300"></th>
                                <th class="px-6 py-3 bg-blue-100 border-b border-gray-300"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($specialite as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $item->id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $item->specialite }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <a href="{{ route('specialite.edit', $item) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <form id="deleteForm{{ $item->id }}" action="{{ route('specialite.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette spécialité ?')" class="text-red-500 hover:text-red-700">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="mt-4 px-6">
                    {{ $specialite->links() }}
                </div>


            </div>

        </div>
    </div>

    <script>
        const boutonOuvrirPopup = document.getElementById('ouvrirPopup');
           const boutonFermerPopup = document.getElementById('fermerPopup');
           const popup = document.getElementById('popup');

           boutonOuvrirPopup.addEventListener('click', function() {
             popup.classList.remove('hidden');
           });

           boutonFermerPopup.addEventListener('click', function() {
             popup.classList.add('hidden');
           });

       </script>

</x-app-layout>
