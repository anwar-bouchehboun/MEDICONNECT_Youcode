<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #3d68ff; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }
    </style>
    <div class="flex">
        <x-sidebar/>
        <div class="flex flex-col w-full h-screen overflow-y-hidden">
            <!-- En-tête Desktop -->
            <header class="items-center hidden w-full px-6 py-2 bg-white sm:flex">
                <main class="flex-grow w-full p-6">
                    <h1 class="pb-6 text-3xl text-black">Dashboard</h1>

                    <div class="flex flex-wrap mt-6">
                        <div class="w-full p-6 md:w-1/2 xl:w-1/3">
                            <div class="p-6 bg-white border rounded shadow">
                                <h3 class="text-lg font-bold">Total Users</h3>
                                <p class="text-2xl text-gray-700">50</p>
                            </div>
                        </div>
                        <div class="w-full p-6 md:w-1/2 xl:w-1/3">
                            <div class="p-6 bg-white border rounded shadow">
                                <h3 class="text-lg font-bold">Total Orders</h3>
                                <p class="text-2xl text-gray-700">100</p>
                            </div>
                        </div>
                        <div class="w-full p-6 md:w-1/2 xl:w-1/3">
                            <div class="p-6 bg-white border rounded shadow">
                                <h3 class="text-lg font-bold">Total Revenue</h3>
                                <p class="text-2xl text-gray-700">$10,000</p>
                            </div>
                        </div>
                    </div>

                    <div class="w-full mt-12">
                        <h2 class="text-lg font-semibold text-gray-700">Recent Orders</h2>
                        <div class="mt-4 overflow-auto bg-white">
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 leading-4 tracking-wider text-left text-blue-500 border-b-2 border-gray-300">Order ID</th>
                                        <th class="px-6 py-3 leading-4 tracking-wider text-left text-blue-500 border-b-2 border-gray-300">Product</th>
                                        <th class="px-6 py-3 leading-4 tracking-wider text-left text-blue-500 border-b-2 border-gray-300">Quantity</th>
                                        <th class="px-6 py-3 leading-4 tracking-wider text-left text-blue-500 border-b-2 border-gray-300">Price</th>
                                        <th class="px-6 py-3 leading-4 tracking-wider text-left text-blue-500 border-b-2 border-gray-300">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">1</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">Product A</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">2</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">$20</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">Completed</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">2</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">Product B</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">1</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">$10</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">Pending</td>
                                    </tr>
                                    <!-- Autres lignes -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </main>
            </header>




        </div>
    </div>



</x-app-layout>
