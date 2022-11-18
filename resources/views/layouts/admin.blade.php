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

        {{-- Por si se me pierdenlos estilos de tailwincss --}}
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Styles -->
        @livewireStyles

        {{-- stack para los estilos que definamos nosotros --}}
        @stack('stiles')

    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
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
              {{--   Para mostrar las alerta del update y otros --}}
                <x-flash-messages/>>
                
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

       

        @livewireScripts

        {{-- Agregamos el stack para los JavaScript --}}
        @stack('script')
    </body>
</html>
