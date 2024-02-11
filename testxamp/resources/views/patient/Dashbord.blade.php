<x-app-layout>
    <div class="flex text-black h-96">
        <x-sidebar/>

        <div class="flex-grow ">
            @if(session('success'))
            <div class="relative px-4 py-3 mt-2 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        </div>
    </div>


</x-app-layout>
