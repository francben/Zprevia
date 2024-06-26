<x-app-layout>
    @php
        $guia = request()->routeIs('guia');
        $politica = request()->routeIs('politica');
        $aviso = request()->routeIs('aviso');
    @endphp
    <div class="py-5">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-4 font-sans w-full flex flex-wrap justify-center">
                <x-button-ayuda href="{{ route('guia') }}"
                    @class([
                        'h-12 tracking-wide mb-4 sm:flex-grow-0 sm:basis-1/4',
                        'bg-verde-800' => $guia,
                        'text-white' => ! $guia
                    ])>
                    Guia de Usuario
                </x-button-ayuda>
                <x-button-ayuda href="{{ route('politica') }}"
                    @class([
                        'h-12 tracking-wide mb-4 flex-grow sm:flex-grow-0 sm:basis-1/4',
                        'bg-verde-800' => $politica,
                        'text-white' => ! $politica
                    ])>
                    Política de Privacidad
                </x-button-ayuda>
                <x-button-ayuda href="{{ route('aviso') }}"
                    @class([
                        'h-12 tracking-wide mb-4 flex-grow sm:flex-grow-0 sm:basis-1/4',
                        'bg-verde-800 text-white' => $aviso,
                        'text-white' => ! $aviso
                    ])>
                    Aviso Legal
                </x-button-ayuda>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-7xl mx-auto">
                <!-- Aquí va el contenido del componente -->
                @if($guia)
                    <iframe src="{{ asset('assets/ayuda/AyudaZprevia.pdf') }}" width="100%" height="600px"></iframe>
                @elseif ($politica)
                    <livewire:guia />
                @elseif ($aviso)
                    <livewire:aviso-legal />
                @endif
            </div>
        </div>
        </div>

</x-app-layout>
