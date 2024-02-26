
<x-app-layout>
    <div class="flex h-0 ">
        <x-sidebar/>
      <div>
        <h1 class="text-4xl font-semibold text-gray-700 uppercase ms-2 ">Reservation </h1>
        <div class="mx-8 my-3 overflow-x-auto">

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white font-[sans-serif]">
                      <thead class="bg-gray-100 whitespace-nowrap">
                        <tr>
                          <th class="px-6 py-3 text-xs font-semibold text-left text-gray-700">
                            Name
                          </th>
                          <th class="px-6 py-3 text-xs font-semibold text-left text-gray-700">
                           Date Reserve
                          </th>
                          <th class="px-6 py-3 text-xs font-semibold text-left text-gray-700">
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody class="whitespace-nowrap">
                        @foreach ($reserve as $item)
                        <tr class="hover:bg-gray-50">
                          <td class="px-6 py-4 text-base">
                        {{ $item->patient->name}}
                          </td>
                          <td class="px-6 py-4 text-base">
                           {{ $item->time }}
                          </td>
                          <td class="hidden px-6 py-4 text-base">
                            {{ $item->patient_id }}
                           </td>
                          <td class="px-6 py-4">
                            <a href="{{ route('consultion.edit', $item) }}" class="mr-4" title="certaficat">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-blue-500 hover:fill-blue-700" viewBox="0 0 348.882 348.882">
                                    <path d="m333.988 11.758-.42-.383A43.363 43.363 0 0 0 304.258 0a43.579 43.579 0 0 0-32.104 14.153L116.803 184.231a14.993 14.993 0 0 0-3.154 5.37l-18.267 54.762c-2.112 6.331-1.052 13.333 2.835 18.729 3.918 5.438 10.23 8.685 16.886 8.685h.001c2.879 0 5.693-.592 8.362-1.76l52.89-23.138a14.985 14.985 0 0 0 5.063-3.626L336.771 73.176c16.166-17.697 14.919-45.247-2.783-61.418zM130.381 234.247l10.719-32.134.904-.99 20.316 18.556-.904.99-31.035 13.578zm184.24-181.304L182.553 197.53l-20.316-18.556L294.305 34.386c2.583-2.828 6.118-4.386 9.954-4.386 3.365 0 6.588 1.252 9.082 3.53l.419.383c5.484 5.009 5.87 13.546.861 19.03z" data-original="#000000" />
                                    <path d="M303.85 138.388c-8.284 0-15 6.716-15 15v127.347c0 21.034-17.113 38.147-38.147 38.147H68.904c-21.035 0-38.147-17.113-38.147-38.147V100.413c0-21.034 17.113-38.147 38.147-38.147h131.587c8.284 0 15-6.716 15-15s-6.716-15-15-15H68.904C31.327 32.266.757 62.837.757 100.413v180.321c0 37.576 30.571 68.147 68.147 68.147h181.798c37.576 0 68.147-30.571 68.147-68.147V153.388c.001-8.284-6.715-15-14.999-15z" data-original="#000000" />
                                </svg>

                            </a>
                            {{-- <a href="{{ route('consultion.show', $item) }}" class="mr-4" title="personne">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-blue-500 hover:fill-blue-700" viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 14c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm0-12c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 2c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm0-2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                </svg>


                            </a> --}}
                          </td>
                        </tr>



                      </tbody>
                    </table>
                  </div>
             @endforeach
          </div>
      </div>



    </div>


</x-app-layout>





