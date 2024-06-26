<div>
    <div class="flex flex-wrap justify-center items-start gap-4">
        @foreach ($days as $dayIndex => $day)
            <div class="border p-6 rounded bg-white flex-shrink-0 text-center w-full sm:w-96 mx-auto my-4">
                <h4 class="text-ms font-semibold mb-2">{{ \Carbon\Carbon::parse($day['date'])->locale('es')->isoFormat('DD [de] MMMM') }}</h4>
                @foreach ($day['turns'] as $turnIndex => $turn)
                    <div class="mb-4 relative" x-data="{ showInput: @entangle('days.' . $dayIndex . '.turns.' . $turnIndex . '.showInput') }">
                        <div x-show="!showInput" class="flex items-center justify-evenly ">
                            <div class="flex items-center justify-start" style="min-width: 120px;">
                                @if($turn['estado'] == 0)
                                    <i class="fa-solid fa-circle mr-2 text-green-600"> </i>
                                    <p class="text-green-600 mr-2">Disponible</p>
                                @elseif($turn['estado'] == 1)
                                    <i class="fa-solid fa-circle mr-2 text-yellow-600"> </i>
                                    <p class="text-yellow-600 mr-2">Reservado</p>
                                @elseif($turn['estado'] == 2)
                                    <i class="fa-solid fa-circle mr-2 text-red-600"> </i>
                                    <p class="text-red-600 mr-2">Ocupado</p>
                                @endif
                            </div>
                            <div @click="showInput = true" class="border p-1 pl-3 rounded w-full cursor-pointer flex justify-evenly  mr-4">
                                <span>{{ $turn['time'] ?  \Carbon\Carbon::parse($turn['time'])->format('H:i') : 'Agregar Hora' }}</span>
                            </div>
                                @if($turn['estado'] == 0)    
                                    <button wire:click="deleteTurn({{ $dayIndex }}, {{ $turnIndex }})" class="text-red-500 ml-2 px-4"><i class="fa fa-trash"></i></button>
                                @else
                                    <span class="text-green-500 ml-2 px-4"><i class="fa fa-check"></i></span>
                                @endif
                        </div>
                        <div x-show="showInput" @click.away="showInput = false;" class="absolute z-10 bg-white border p-2 rounded shadow-md w-full">
                            <div class="flex items-baseline">
                                <x-input type="time" wire:model="days.{{ $dayIndex }}.turns.{{ $turnIndex }}.time" class="border p-2 rounded w-full" />
                                <button wire:click="confirmTurn({{ $dayIndex }}, {{ $turnIndex }})" class="bg-verde-800 text-white px-4 py-2 rounded mt-2 ml-2">
                                    @if ($turn['editing'])
                                        <i class="fa fa-save"></i>
                                    @else
                                        <i class="fa fa-check"></i>
                                    @endif
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
                <button wire:click="addTurn({{ $dayIndex }})" class="bg-verde-800 text-white text-sm px-4 py-1 rounded mt-2">Agregar Turno</button>
            </div>
        @endforeach
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Escuchar el evento para mostrar el mensaje -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Livewire.on('turnsSaved', message => {
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


