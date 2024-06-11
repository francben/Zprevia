<x-guest-layout>
    <x-pago-card>
        <x-slot name="logo" class="w-1/2 flex flex-col items-center justify-center">
            <div class="mb-4 flex flex-col items-center justify-center">
                <x-card-logo />
                <br>
                <h1 class="mb-1" style="font-family:Poppins, sans-serif;font-size:26px;font-weight:900;">{{ __('¡Completa tu participación!') }}</h1>
            </div>
            <x-card-event
                title="Conecta Empresarios 2024" 
                imagen="path/to/your/image.jpg" 
                fecha="21 de Octubre del 2024" 
                localidad="Madrid" 
            />

        </x-slot>
        
        <x-validation-errors class="mb-4" />

        
    </x-pago-card>
</x-guest-layout>
