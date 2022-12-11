<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=cabin:400">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Sweet alerts -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-cover bg-[url({{ Storage::url('img/fondo.jpg') }})]">
    <x-jet-banner />

    <div class="min-h-screen">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
       
    </div>

    @stack('modals')

    @livewireScripts

    @if (session('info'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ session('info') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    <footer class="mt-40 p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 bg-gradient-to-r from-[#981F80] to-[#1F2198]">
        <span class="text-sm text-white sm:text-center ">© 2022 <a href=""
                class="hover:underline">GameStation</a>. All Rights Reserved.
        </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm text-white sm:mt-0">
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">Social Media</a>
            </li>
            <li>
                <a href="#" class="hover:underline">Contact</a>
            </li>
        </ul>
    </footer>
</body>

</html>
