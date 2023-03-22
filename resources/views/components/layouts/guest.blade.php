<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Empresa Publica Aguas de Manta') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- sweet alert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        @livewireStyles
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/validations.js'])
        
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                @php
                    $nombreRuta = Route::currentRouteName();
                @endphp
                @if($nombreRuta === 'login')
                <a href="{{ route('dashboard') }}">
                    <x-application-logo-letter class="w-50 h-40 fill-current text-gray-500" />
                </a>
                @else
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
                @endif
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
        @livewireScripts
        <script>
            // Livewire.on('alert', (message) => {
            //     Swal.fire({
            //         title: 'Creado!',
            //         text: message,
            //         icon: 'success',
            //     })
            // })
        </script>
    </body>
</html>
