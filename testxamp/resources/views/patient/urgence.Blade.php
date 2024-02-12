<x-app-layout>
    <div class="flex text-black h-96">
        <x-sidebar/>
        <div class="">
            <div>
                <h2 class="text-4xl font-semibold text-gray-700 uppercase ms-2">Reservation Urgence</h2>
            </div>
            <div class="ps-80">
                <form action="{{ route('reservation.store') }}" method="post" class="p-6">
                    @csrf

                    <div class="mb-2">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-700">Date:</label>
                        <input type="datetime-local" id="date" name="date" class="px-3 py-2 border rounded-md w-60 focus:outline-none focus:border-blue-500" value="{{ old('date') }}">
                    </div>
                    <select name="status"  class="hidden w-full p-2 mb-2 border rounded-md focus:outline-none focus:border-blue-500">
                        <option value="urgence">Urgence</option>
                        {{-- <option value="urgence">Urgence</option> --}}
                    </select>


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
