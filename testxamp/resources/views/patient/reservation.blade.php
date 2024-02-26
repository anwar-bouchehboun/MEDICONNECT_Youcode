<x-app-layout>
    <div class="flex text-black h-96">
        <x-sidebar/>
        <div class="">
            <div>
                <h2 class="text-4xl font-semibold text-gray-700 uppercase ms-2">Reservation</h2>
            </div>
            <div class="ps-80">

                <h3 class="text-3xl "><strong class="text-4xl "> DOCTOR : </strong>{{ $medecin->name }}</h3>
                <form action="{{ route('reservation.store') }}" method="post" class="hidden p-6" id="form">
                    @csrf

                    {{-- <div class="mb-2">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-700">Date:</label>
                        <input type="datetime-local" id="date" name="date" class="px-3 py-2 border rounded-md w-60 focus:outline-none focus:border-blue-500" value="{{ old('date') }}">
                    </div> --}}
                    {{-- <select name="status"  class="hidden w-full p-2 mb-2 border rounded-md focus:outline-none focus:border-blue-500"> --}}
                        {{-- <option value="normal">Normal</option> --}}
                        {{-- <option value="urgence">Urgence</option> --}}
                    {{-- </select> --}}
                  <input type="text" name="time" id="check">
                  <input type="text" name="check" value="1">
                    @if(isset($medecin))

                        <div class="hidden mb-2 ">
                            <label for="medecin" class="block mb-2 text-sm font-medium text-gray-700">Médecin:</label>
                            <input type="text" name="medecin_id" id="medecin" value="{{ $medecin->id }}" readonly class="px-3 py-2 border rounded-md w-60 focus:outline-none focus:border-blue-500">
                        </div>
                    @endif

                    {{-- <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md w-60 hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Ajouter Reservation</button> --}}
                </form>
                @if(session('success'))
                <div class="relative px-4 py-3 mt-2 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
                @endif

            </div>
            <div class="max-w-md mx-auto">
                <h2 class="mb-4 text-lg font-semibold">Tableau de réservation</h2>
                <div id="reservationSlots" class="flex gap-2">
                  <div class="p-4 bg-white rounded-md shadow-md">
                    <p class="mb-2 text-lg font-semibold">09h00-10h00</p>
                    <button data-time="9h-10h" class="px-4 py-2 font-bold text-white bg-blue-500 rounded reserveButton hover:bg-blue-700 focus:outline-none focus:shadow-outline">Réserver</button>
                  </div>
                  <div class="p-4 bg-white rounded-md shadow-md">
                    <p class="mb-2 text-lg font-semibold">10h00-11h00</p>
                    <button data-time="10h-11h" class="px-4 py-2 font-bold text-white bg-blue-500 rounded reserveButton hover:bg-blue-700 focus:outline-none focus:shadow-outline">Réserver</button>
                  </div>


                  <div class="p-4 bg-white rounded-md shadow-md">
                    <p class="mb-2 text-lg font-semibold">11h00-12h00</p>
                    <button data-time="11h-12h" class="px-4 py-2 font-bold text-white bg-blue-500 rounded reserveButton hover:bg-blue-700 focus:outline-none focus:shadow-outline">Réserver</button>
                  </div>
                  <div class="p-4 bg-white rounded-md shadow-md">
                    <p class="mb-2 text-lg font-semibold">14h00-15h00</p>
                    <button data-time="14h-15h" class="px-4 py-2 font-bold text-white bg-blue-500 rounded reserveButton hover:bg-blue-700 focus:outline-none focus:shadow-outline">Réserver</button>
                  </div>
                  <div class="p-4 bg-white rounded-md shadow-md">
                    <p class="mb-2 text-lg font-semibold">15h00-16h00</p>
                    <button data-time="15h-16h" class="px-4 py-2 font-bold text-white bg-blue-500 rounded reserveButton hover:bg-blue-700 focus:outline-none focus:shadow-outline">Réserver</button>
                  </div>
                  <div class="p-4 bg-white rounded-md shadow-md">
                    <p class="mb-2 text-lg font-semibold">16h00-17h00</p>
                    <button data-time="16h-17h" class="px-4 py-2 font-bold text-white bg-blue-500 rounded reserveButton hover:bg-blue-700 focus:outline-none focus:shadow-outline">Réserver</button>
                  </div>
                </div>
              </div>

              @if ($errors->any())
              <div class="relative px-4 py-3 mx-4 my-2 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                  <ul class="mt-3 text-sm text-red-600 list-disc list-inside">
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
          const reserveButtons = document.querySelectorAll('.reserveButton');
          reserveButtons.forEach(button => {
            button.addEventListener('click', function() {
              const timeSlot = this.getAttribute('data-time');

              document.querySelector('#check').value = timeSlot;

              document.querySelector('#form').submit();
            });
          });
        });
      </script>

</x-app-layout>
