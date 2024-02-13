<x-app-layout>
    <div class="flex text-black h-96">
        <x-sidebar/>
        <div class="">
            <div>
                <h2 class="text-4xl font-semibold text-gray-700 uppercase ms-2">Reservation</h2>
            </div>
            <div class="ps-80">
                @if(session('success'))
                <div class="relative px-4 py-3 mt-2 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
                @endif
                <h3 class="text-3xl "><strong class="text-4xl "> DOCTOR : </strong>{{ $medecin->name }}</h3>
                <form action="{{ route('reservation.store') }}" method="post" class="p-6">
                    @csrf

                    <div class="mb-2">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-700">Date:</label>
                        <input type="datetime-local" id="date" name="date" class="px-3 py-2 border rounded-md w-60 focus:outline-none focus:border-blue-500" value="{{ old('date') }}">
                    </div>
                    <select name="status"  class="hidden w-full p-2 mb-2 border rounded-md focus:outline-none focus:border-blue-500">
                        <option value="normal">Normal</option>
                        {{-- <option value="urgence">Urgence</option> --}}
                    </select>

                    @if(isset($medecin))

                        <div class="hidden mb-2 ">
                            <label for="medecin" class="block mb-2 text-sm font-medium text-gray-700">Médecin:</label>
                            <input type="text" name="medecin_id" id="medecin" value="{{ $medecin->id }}" readonly class="px-3 py-2 border rounded-md w-60 focus:outline-none focus:border-blue-500">
                        </div>
                    @endif

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
            </div>
        </div>
    </div>
</x-app-layout>
