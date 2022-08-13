<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}
    <script src="{{ asset('js/modal.js') }}" defer></script>


</head>
<body class="font-sans antialiased">
    <div class="flex flex-row text-gray-800">
        @include('layouts.navigation')
        <main class="main-content flex flex-col flex-grow m-5 mt-16 max-w-7xl">
            <section class="relative">
                @yield('content')
            </section>
        </main>
    </div>
</body>
</html>
