<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MedConnect</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script> <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-900">
    <div class="flex flex-col items-center min-h-screen px-4 pt-6 bg-gray-100 sm:justify-center">


        <div class="w-full px-6 py-4 overflow-hidden bg-white shadow-md sm:rounded-lg">
            <div class="max-w-4xl mx-auto font-[sans-serif] text-[#333]">

                {{ $slot }}
                {{-- <div> --}}
                </div>
            </div>

</body>

</html>
