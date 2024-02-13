<x-app-layout>
    <div class="flex h-0 ">
        <x-sidebar/>

        <div class="ps-1">
            <div>
                <h2 class="text-4xl font-semibold text-gray-700 uppercase ms-2"> Liste Doctor</h2>

            </div>
            <form action="{{ route('filtrer.specialite') }}" method="get">
                <select name="specialite_id" id="specialite" class="block px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm w-52 focus:outline-none focus:border-blue-500" onchange="this.form.submit()">
                    <option value="" disabled selected>Select Specialite</option>
                    @isset($specialite)
                        @foreach ($specialite as $item)
                            <option value="{{ $item->id }}"  class="text-gray-600">{{ $item->specialite }}</option>
                        @endforeach
                    @endisset
                </select>

            </form>


            @if(session('success'))
            <div class="relative px-4 py-3 mt-2 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif
            <div class="grid grid-cols-5 gap-4 ">
                @foreach ($medecins as $item)

                <div class="w-48 card">
                    <div class=" bg-cyan-400 shadow-[0_2px_18px_-6px_rgba(0,0,0,0.2)] w-full  rounded-lg font-[sans-serif] overflow-hidden mx-auto mt-4">
                        <div class="px-4 my-6 pe-12">
                            <h3 class="text-lg font-semibold">{{$item->name  }}</h3>
                            <p class="mt-2 text-sm text-gray-400">{{$item->phone  }}</p>
                            <p class="w-20 mt-2 mb-2 text-sm text-black">{{ $item->specialite->specialite }}</p>
                            <a href="{{ route('reservation.show',$item->id) }}" class="px-6 py-2 mt-4 text-sm font-semibold tracking-wider text-white bg-blue-600 border-none rounded outline-none hover:bg-blue-700 active:bg-blue-600">View</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>



        </div>





    </div>


</x-app-layout>
