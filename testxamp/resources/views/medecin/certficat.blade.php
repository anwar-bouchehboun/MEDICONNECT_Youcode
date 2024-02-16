
<x-app-layout>
    <div class="flex h-0 ">
        <x-sidebar/>
      <div>
        <h1 class="text-4xl font-semibold text-gray-700 uppercase ms-2 ">Certaficat Chaque Personne </h1>
        <div class="mx-8 my-3 overflow-x-auto">
            <form action="{{ route('consultion.store') }}" method="post">
                @csrf
            <div class="flex flex-col justify-center max-w-lg px-4 mx-auto space-y-6 font-sans text-gray-700">
                <div>
                    <label class="block mb-2 text-lg">Date Certificat</label>
                    <input type='text' name="date_consultation" class="px-4 py-2.5 text-lg rounded-md bg-white border border-gray-400 w-full focus:outline-none focus:border-blue-500"  value="{{$consultion->date  }}"/>
                </div>

                <div>

                    <input type='text' name="patient_id" value="{{ $consultion->patient_id }}"  class="hidden w-full px-4 py-2 text-lg bg-white border border-gray-400 rounded-md focus:outline-none focus:border-blue-500" />
                </div>
                <div>
                    <label class="block mb-2 text-lg">Nombre de Jours</label>
                    <input type='text' name="nomberjr" placeholder='Nombre de Jours' class="w-full px-4 py-2 text-lg bg-white border border-gray-400 rounded-md focus:outline-none focus:border-blue-500" />
                </div>
            </div>
            <button type="submit" class="px-20 py-2 m-20 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Envoie certificat</button>

        </form>
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


</x-app-layout>





