<x-app-layout>
    
    <div class="py-5">
        <div class=" pl-4 pr-3">
            <div class="flex mb-4">
                <a href="{{ route('evento.planificar', ['id' => $id]) }}" class="btnreturn py-1 flex items-center space-x-2">
                    <x-icon_back/>
                </a>
                <h1 class="text-lg font-semibold">Turnos</h1>
            </div>
        </div>
        <div class="container mx-auto pr-4 pl-4">
            <div class="bg-white shadow-lg p-0 flex flex-col md:flex-row">
                @livewire('control-turnos', ['eventId' => $id])
            </div>
        </div>
    </div>
</x-app-layout>
