<div>
    <div class="relative bg-white mt-3 grid grid-cols-1 gap-6 md:grid-cols-1 content-container">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-1">
            <div class="flex justify-between items-center p-4 rounded-lg">
                <div class="text-base font-bold text-gray-900">
                Total solicitudes: {{count($entrevistas)}}
                </div>
                <div class="flex space-x-4">
                    <div x-data="{ isOpen: false }" @click.away="isOpen = false">
                        <button @click="isOpen = !isOpen" class="inline-flex items-center px-6 py-2 bg-white-800 border border-gray rounded-full text-sm text-black tracking-widest hover:bg-verde-100 focus:bg-verde-100 active:bg-dark-900 focus:outline-none focus:ring-2 focus:ring-verde-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150">
                            Ordenar: Hora Creación
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show.transition.origin.top.left="isOpen" class="max-w-max absolute z-10 mt-2 origin-top-left rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                            <div class="max-w-max py-1 rounded-md" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <button wire:click="setOption('Invitados')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Por Invitados</button>
                                <button wire:click="setOption('Nombre')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Por Nombre</button>
                                <button wire:click="setOption('Mesa')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Por Mesa</button>
                                <button wire:click="setOption('Turno')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Por Turno</button>
                                <button wire:click="setOption('Hora Creación')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Por Hora de Creación</button>
                            </div>
                        </div>
                    </div>
                    <button class="inline-flex items-center px-6 py-2 bg-white-800 border border-gray rounded-full text-sm text-black tracking-widest hover:bg-dark-700 focus:bg-dark-700 active:bg-dark-900 focus:outline-none focus:ring-2 focus:ring-dark-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150">
                        Filtrar
                        <x-icon_filter />
                    </button>
                </div>
            </div>
            <div class="overflow-hidden">
        <table class="min-w-full w-full table-auto divide-y divide-gray-200 white:divide-neutral-700">
            <thead>
                <tr>
                    <th scope="col" class="px-3 py-3 text-center align-center text-sm font-medium text-gray-500 uppercase white:text-neutral-500">
                        <x-icon_user />
                    </th>
                    <th scope="col" class="px-3 py-3 text-start text-sm font-medium text-gray-500 uppercase white:text-neutral-500">Empresa</th>
                    <th scope="col" class="px-3 py-3 text-start text-sm font-medium text-gray-500 uppercase white:text-neutral-500">Solicitante</th>
                    <th scope="col" class="px-3 py-3 text-start text-sm font-medium text-gray-500 uppercase white:text-neutral-500">Mesa</th>
                    <th scope="col" class="px-3 py-3 text-start text-sm font-medium text-gray-500 uppercase white:text-neutral-500">Turno</th>
                    <th scope="col" class="px-3 py-3 text-start text-sm font-medium text-gray-500 uppercase white:text-neutral-500">Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entrevistas as $entrevista)
                <tr class="odd:bg-white even:bg-white-100 hover:bg-gray-100 white:odd:bg-neutral-800 white:even:bg-neutral-700">
                    <td class="flex justify-center px-4 py-4 whitespace-normal break-words text-xs font-medium text-blue-900 white:text-neutral">
                        <img src="{{ asset('storage/' . $entrevista->solicitante->companies->logo) }}" alt="Profile" class="rounded-full w-10 h-10">
                    </td>
                    <td class="px-2 py-4 whitespace-normal break-words text-xs font-medium text-gray-800 white:text-neutral">
                        {{ $entrevista->solicitante->companies->name }}
                    </td>
                    <td class="px-2 py-4 whitespace-normal break-words text-xs text-gray-800 white:text-neutral">
                        @if(isset($entrevista->solicitante->name))
                            {{ $entrevista->solicitante->name }}
                        @endif
                    </td>
                    <td class="px-4 py-4 whitespace-normal break-words text-xs text-gray-800 white:text-neutral">
                        @if($selectedEntrevistaId === $entrevista->id)
                            <input type="text" wire:model="mesa" class="py-1 block max-w-[50px] rounded-md border-gray-200 shadow-sm">
                            @error('mesa') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        @else
                            {{ $entrevista->mesa ?? 'En proceso' }}
                        @endif
                    </td>
                    <td class="px-4 py-4 whitespace-normal break-words text-xs text-gray-800 white:text-neutral">
                        @if($selectedEntrevistaId === $entrevista->id)
                            <select wire:model="selectedTurno" class="py-1 block w-md rounded-md border-gray-200 shadow-sm">
                                <option value="">Seleccionar turno</option>
                                @foreach($turnos as $turno)
                                    <option value="{{ $turno->id }}">{{ \Carbon\Carbon::parse($turno->time)->format('H:i') }}</option>
                                @endforeach
                            </select>
                            @error('selectedTurno') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        @else
                            {{ \Carbon\Carbon::parse($entrevista->turno->time)->format('H:i')?? 'En proceso' }}
                        @endif
                    </td>
                    <td class="px-4 py-4 whitespace-normal break-words text-xs text-gray-800 white:text-neutral text-center flex items-center justify-center">
                        @if($selectedEntrevistaId === $entrevista->id)
                            <button wire:click="save" class="text-blue-600"><x-icon-save /></button>
                        @else
                            <button wire:click="selectEntrevista({{ $entrevista->id }})" class="text-blue-600"><x-icon_edit /></button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginación -->
        {{ $entrevistas->links() }}
    </div>
        </div>
        {{ $entrevistas->onEachSide(2)->links('vendor.pagination.tailwind')}}
        <div class="flex justify-center items-center mb-4">
            <a href="{{ route('evento.participantes', ['id' => $evento_actual_id]) }}">
                <button class="inline-flex items-center px-6 py-3 bg-white-800 border border-gray rounded-full font-semibold text-base text-black tracking-widest hover:bg-dark-700 focus:bg-dark-700 active:bg-dark-900 focus:outline-none focus:ring-2 focus:ring-dark-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150">Volver</button>
            </a>
        </div>
    </div>
    <!-- Escuchar el evento para mostrar el mensaje -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Livewire.on('entrevistaSaved', message => {
                showFlashMessage(message);
            });

            function showFlashMessage(message) {
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
                title: message
            });
            }
        });
    </script>
</div>

