
<x-app-layout>
    <div class="flex text-black h-96">
        <x-sidebar/>
        <div class="">
            <div>
                <h2 class="text-4xl font-semibold text-gray-700 uppercase ms-2">Reservation</h2>

            </div>
  <div class=" ps-80">
    <div class="max-w-md mx-auto overflow-hidden bg-white shadow-md rounded-xl">
        <div class="mb-2">
            <form action="{{ route('filtrer.specialite') }}" method="get">
                <label for="specialite" class="block mb-2 font-medium text-gray-700">Spécialité :</label>
                <select name="specialite_id" id="specialite" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" onchange="this.form.submit()">
                    <option value="" disabled selected>Sélectionnez une spécialité</option>
                    @foreach ($specialite as $item)
                    <option value="{{ $item->id }}" {{ isset($specialite_id) ? ($specialite_id == $item->id ? 'selected' : '') : '' }}>{{ $item->specialite }}</option>
                    @endforeach
                </select>
            </form>

         </div>


         <form action="{{ route('reservation.store') }}" method="post" class="p-6">
            @csrf
            <div class="mb-2">
@if( isset($specialite_id))
                <input type="hidden" name="specialite_id" class="px-3 py-2 border rounded-md w-60 focus:outline-none focus:border-blue-500" value="{{$specialite_id }}">
           @endif
            </div>
            <div class="mb-2">
                <label for="date" class="block mb-2 text-sm font-medium text-gray-700">Date:</label>
                <input type="datetime-local" id="date" name="date" class="px-3 py-2 border rounded-md w-60 focus:outline-none focus:border-blue-500" value="{{ old('date') }}">
            </div>
            <div class="mb-2">
                <label for="status" class="block mb-2 text-sm font-medium text-gray-700">Statut:</label>
                <select id="status" name="status" class="px-3 py-2 border rounded-md w-60 focus:outline-none focus:border-blue-500">
                    <option value="urgence">Urgence</option>
                    <option value="normal">Normal</option>

                </select>
            </div>
            @if(isset($medecin))
            <div class="mb-2">
                <label for="medecin_id" class="block mb-2 text-sm font-medium text-gray-700">Médecin:</label>
                <select id="medecin_id" name="medecin_id" class="px-3 py-2 border rounded-md w-60 focus:outline-none focus:border-blue-500">
                    <option value="" disabled selected>Sélectionnez une Medecin</option>

                    @foreach ($medecin as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md w-60 hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Ajouter Reservation</button>
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



        @endif


    </div>

  </div>

        </div>

    </div>


</x-app-layout>
