<x-app-layout>
    <div class="flex h-0 ">
        <x-sidebar/>

        <div class="ps-1">
            <div>
                <h2 class="text-4xl font-semibold text-gray-700 uppercase ms-2"> Liste Doctor</h2>

            </div>
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

        {{-- <div class="flex flex-col w-full h-screen m-0 overflow-y-hidden">

            <div class="flex flex-wrap justify-center gap-2 bg-black ms-32">
                @foreach ($medecins as $item)
                <div class="flex-shrink-0 w-full overflow-hidden bg-white rounded-lg shadow-md sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5">
                    <div class="px-6 py-4">
                        <h3 class="text-lg font-semibold">{{ $item->name }}</h3>
                        <p class="mt-2 text-sm text-gray-600">{{ $item->specialite->specialite }}</p>
                    </div>
                    <div class="px-6 py-4">
                        <button type="button" class="w-full px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Voir</button>
                    </div>
                </div>
                @endforeach
            </div>




        </div> --}}
    </div>


</x-app-layout>
