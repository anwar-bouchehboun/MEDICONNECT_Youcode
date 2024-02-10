<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #3d68ff; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }

    </style>
    <div class="flex">
        <x-sidebar/>
        <div class="flex flex-col w-full h-screen overflow-y-hidden">
            <button id="ouvrirPopup" class="w-20 px-4 py-2 mx-2 mt-4 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Add</button>
            @if(session('success'))
            <div class="relative px-4 py-3 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

            <div id="popup" class="fixed inset-0 flex items-center justify-center hidden bg-gray-900 bg-opacity-50">
              <div class="max-w-md p-8 mx-3 bg-white rounded shadow-md">
                <h2 class="mb-4 text-xl font-semibold">Formulaire d'insertion de spécialité professionnelle</h2>
                <form action="{{ route('specialite.store') }}" method="post">
                    @csrf
                  <div class="mb-4">
                    <label for="specialite" class="block mb-2 font-medium text-gray-700">Spécialité professionnelle :</label>
                    <input type="text" id="specialite" name="specialite" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" placeholder="Entrez votre spécialité professionnelle">
                  </div>
                  <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Soumettre</button>
                </form>
                <button id="fermerPopup" class="px-4 py-2 mt-4 text-white bg-red-500 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">Fermer</button>
              </div>
            </div>





        </div>
    </div>



</x-app-layout>
