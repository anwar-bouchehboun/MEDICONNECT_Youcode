
<x-app-layout>
    <div class="flex h-0 ">
        <x-sidebar/>
      <div>

        <div class="max-w-md my-2 overflow-hidden bg-white rounded-lg shadow-md mx-72">
            <div class="px-4 py-2 text-white bg-blue-500">
                <h2 class="text-lg font-semibold">Consultation</h2>
            </div>
            <div class="p-4">



                <div class="mb-4">
                    <label class="block mb-1 text-sm font-semibold">Date et heure :</label>
                    <p class="text-gray-800">{{ $con->date_consultation }}
                    </p>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-semibold">CIN :</label>
                    <p class="text-gray-800">{{ $con->patient->cin }}</p>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-semibold">Patient :</label>
                    <p class="text-gray-800">{{ $con->patient->name }}</p>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-semibold">Symptômes :</label>
                    <p class="text-gray-800">Fièvre, maux de tête, toux</p>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm font-semibold">Prescription :</label>
                    <ul class="text-gray-800 list-disc list-inside">
                        <li>Paracétamol - 500mg, 3 fois par jour</li>
                        <li>Repos au lit</li>
                        <li>Boire beaucoup de liquides</li>
                    </ul>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-semibold">Remarques :</label>
                    <p class="text-gray-800">Revoir le patient dans 3 jours si les symptômes persistent.</p>
                </div>

            </div>
        </div>

      </div>



    </div>


</x-app-layout>





