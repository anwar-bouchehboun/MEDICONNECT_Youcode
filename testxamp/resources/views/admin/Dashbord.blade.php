<x-app-layout>
    <div class="flex">
        <x-sidebar/>
        <div class="flex flex-col w-full h-screen overflow-y-hidden">
            <!-- En-tête Desktop -->
            <header class="items-center hidden w-full px-6 py-2 bg-white sm:flex">
                <main class="flex-grow w-full p-6">
                    <h1 class="pb-6 text-3xl text-black uppercase">Statestique</h1>

                    <div class="flex flex-wrap mt-6">
                        <div class="w-full p-6 md:w-1/2 xl:w-1/3">
                            <div class="p-6 bg-white border rounded shadow-md">
                                <h3 class="text-lg font-bold text-gray-800">Total Spécialités</h3>
                                <p class="text-2xl text-gray-700">{{ $specialitesCount }}</p>
                            </div>
                        </div>
                        <div class="w-full p-6 md:w-1/2 xl:w-1/3">
                            <div class="p-6 bg-white border rounded shadow-md">
                                <h3 class="text-lg font-bold text-gray-800">Total Médicaments</h3>
                                <p class="text-2xl text-gray-700">{{ $medicamentsCount }}</p>
                            </div>
                        </div>
                        <div class="w-full p-6 md:w-1/2 xl:w-1/3">
                            <div class="p-6 bg-white border rounded shadow-md">
                                <h3 class="text-lg font-bold text-gray-800">Total Patients</h3>
                                <p class="text-2xl text-gray-700">{{ $patientCount }}</p>
                            </div>
                        </div>
                        <div class="w-full p-6 md:w-1/2 xl:w-1/3">
                            <div class="p-6 bg-white border rounded shadow-md">
                                <h3 class="text-lg font-bold text-gray-800">Total Médecins</h3>
                                <p class="text-2xl text-gray-700">{{ $medecinCount }}</p>
                            </div>
                        </div>
                    </div>



                </main>
            </header>




        </div>
    </div>



</x-app-layout>
