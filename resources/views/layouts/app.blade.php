<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Zprevia') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Incluye SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Incluye SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased h-screen">
    <x-banner />

    <div class="flex h-screen">
        <!-- Menú lateral -->
        <div class="contenedor_Menu h-full mr-1">
            <!-- Contenido del menú aquí -->
            @livewire('navigation-menu')
        </div>

        <!-- Contenido principal -->
        <div class="h-full flex flex-col bg-gris-100 flex-1">
            <!-- Encabezado -->
            <header class="bg-white shadow" style="height: 72px;">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <!-- Input de búsqueda -->
                    <div class="flex items-center w-full max-w-xl h-full">
                        <div class="relative w-full h-full">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.9 14.32a8 8 0 111.42-1.42l4.32 4.32-1.42 1.42-4.32-4.32zM8 14A6 6 0 108 2a6 6 0 000 12z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            <input type="search" class="block w-full h-full pl-10 pr-3 py-2 border-0 focus:outline-none focus:ring-0 focus:border-transparent sm:text-sm" placeholder="Busqueda" />
                        </div>
                    </div>
                    <!-- Icono de notificación -->
                    <div class="mr-1">
                        <div class="relative">
                            <button class="bg-white p-1 rounded-full text-gray-500 hover:text-gray-700 border-0 focus:border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2">
                                <span class="sr-only">Notificaciones</span>
                                <!-- Heroicon name: bell -->
                                <svg
                                    width="15.999999"
                                    height="19.500002"
                                    viewBox="0 0 15.999999 19.500002"
                                    fill="none"
                                    version="1.1"
                                    id="svg1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:svg="http://www.w3.org/2000/svg">
                                    <defs
                                        id="defs1" />
                                    <path
                                        d="M 15.5,15.7071 V 16 H 0.50000002 V 15.7071 L 2.35355,13.8536 2.5,13.7071 V 13.5 8.5000003 C 2.5,5.5943701 4.02219,3.2809201 6.6153,2.6665301 L 7,2.5753801 v -0.39538 -0.68 C 7,0.94614006 7.4461,0.50000006 8,0.50000006 c 0.5538999,0 0.9999999,0.44614 0.9999999,1.00000004 v 0.68 0.39506 l 0.3843,0.09138 C 11.9681,3.2807601 13.5,5.6048201 13.5,8.5000003 V 13.5 13.7071 l 0.1464,0.1465 z M 9.4134999,18 C 9.2060999,18.5806 8.6487999,19 8,19 7.3443,19 6.7907,18.5813 6.5854,18 Z"
                                        fill="#ffffff"
                                        stroke="#c2cfe0"
                                        id="path1" />
                                    </svg>
                            </button>
                            <!-- Menú desplegable de notificaciones -->
                            <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5" style="display:none;">
                                <!-- Elementos de notificación aquí -->
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">No new notifications</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-1 overflow-y-auto">
                {{ $slot }}
            </main>
        </div>
    </div>

    @stack('modals')
    
    {{--@livewire('wire-elements-modal')--}}
    @if (session()->has('success'))
        <script>
            const mensaje = {!! json_encode(session()->get('success')) !!};
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: mensaje
            });
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            const mensaje = {!! json_encode(session()->get('error')) !!};
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "error",
                title: mensaje
            });
        </script>
    @endif
    
    @livewireScripts
    @stack('js')
</body>
</html>
