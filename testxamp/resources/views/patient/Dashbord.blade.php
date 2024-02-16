<x-app-layout>
    <div class="flex h-0 ">
        <x-sidebar/>
      <div>
        <h1 class="text-4xl font-semibold text-gray-700 uppercase ms-2 ">consultation</h1>
        <div class="mx-8 my-3 overflow-x-auto">
            <table class="min-w-full bg-white font-[sans-serif]">
              <thead class="bg-gray-800 whitespace-nowrap">
                <tr>
                  <th class="px-6 py-3 text-sm font-semibold text-left text-white">
                    Doctor
                  </th>
                  <th class="px-6 py-3 text-sm font-semibold text-left text-white">
                    Date Consultation
                  </th>
                  <th class="px-6 py-3 text-sm font-semibold text-left text-white">
                    Nombre de jours
                  </th>
                  <th class="px-6 py-3 text-sm font-semibold text-left text-white">
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody class="whitespace-nowrap">
                @if ($Certaficat->count() > 0)
                @foreach ($Certaficat as $certificat)
                    <tr class="{{ $loop->even ? 'bg-blue-50' : '' }}">
                        <td class="px-6 py-4 text-sm">
                         {{ $certificat->medecin->name }}
                        </td>
                        <td class="px-6 py-4 text-sm">
                            {{ $certificat->date_consultation }}
                            <td class="px-6 py-4 text-sm">
                                {{ $certificat->nomberjr }}                         </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('certaficat',  $certificat) }}" class="mr-4" title="Imprimer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-blue-500 hover:fill-blue-700" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm2-2a1 1 0 00-1 1v10a1 1 0 001 1h12a1 1 0 001-1V4a1 1 0 00-1-1H4z" clip-rule="evenodd" />
                                    <path fill-rule="evenodd" d="M12.293 7.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L8 10.586l3.293-3.293zM6 14h8v-2H6v2z" clip-rule="evenodd" />
                                </svg>
                            </a>

                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="px-6 py-4 text-sm text-center text-gray-500">Aucun certificat trouvé.</td>
                </tr>
            @endif

              </tbody>
            </table>
          </div>
      </div>



    </div>


</x-app-layout>
