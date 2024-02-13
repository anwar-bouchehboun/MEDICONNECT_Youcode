<x-admin-layout>


      <div>
      <div class="container px-4 py-8 mx-auto">
    <div class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
        @foreach ($Certaficat as  $item)


        <div class="mb-6">
            <h1 class="mb-2 text-2xl font-bold">Certificat Professionnel</h1>
            <p class="text-sm text-gray-600">Date: {{ $item->date_consultation }}</p>
        </div>
        <div class="mb-6">
            <p class="font-bold text-gray-700">Ce certificat est décerné à :</p>
            <p class="text-lg">{{ $item->patient->name }}</p>
           </div>
        <div class="mb-6">
            <p class="font-bold text-gray-700">Par Médecin :</p>
            <p class="text-lg"> {{ $item->medecin->name }}
            </p>
        </div>
        <div class="mb-6">
            <p class="font-bold text-gray-700">nombre de jours :</p>
            <p class="text-lg">{{ $item->nomberjr }}</p>
        </div>
        <div>
        </div>
        @endforeach
    </div>
      <button onclick="window.print()" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Imprimer le certificat</button>


</div>
</x-app-layout>
