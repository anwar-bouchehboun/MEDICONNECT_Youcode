<x-app-layout>
    <div class="flex text-black h-96">
        <x-sidebar/>
        <d class="">
            <div class="max-w-md mx-64 overflow-hidden bg-white rounded-lg shadow-lg my-11">
                <div class="px-4 py-2">
                    <h2 class="text-xl font-bold text-gray-800">Réservation d'Urgence</h2>
                </div>
                <div class="px-4 py-2">
                    <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et enim eu enim fringilla malesuada. Phasellus posuere metus non odio posuere, sed vehicula nisl aliquet. Sed ut vestibulum ipsum. Duis commodo nec leo id eleifend. Ut rhoncus diam sed interdum cursus. Morbi vel velit ac lectus dapibus condimentum. Integer sit amet libero quis dolor dictum ullamcorper. Fusce eget justo a eros bibendum consectetur. Nunc efficitur feugiat ipsum at rutrum.</p>
                </div>
                @if(session('success'))
                <div class="relative px-4 py-3 mt-2 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
                @endif







                <form method="POST" action="{{ route('urgence.reservation') }}" class="mx-6 my-6">
                    @csrf
                    <input type="text" class="hidden" name="check" value="1">
                    <button type="submit" class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a1 1 0 01-.83-.45l-3.41-4.26C5.23 12.61 4.41 12 3.5 12H2a1 1 0 01-1-1V7a1 1 0 011-1h1.5c.41 0 .8-.21 1.02-.55l3.41-6A1 1 0 018.92 0h2.16a1 1 0 01.93.45l3.41 6c.22.34.61.55 1.02.55H18a1 1 0 011 1v4a1 1 0 01-1 1h-1.5c-.41 0-.8.21-1.02.55l-3.41 4.26A1 1 0 0110 18zM6.65 6h6.7l2.71 5H3.94l2.71-5z" clip-rule="evenodd" />
                        </svg>
                        Réserver en urgence
                    </button>
                </form>






                @if ($errors->any())
                    <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                        <ul class="mt-3 text-sm text-red-600 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>







            </div>
        </div>
    </div>
</x-app-layout>
