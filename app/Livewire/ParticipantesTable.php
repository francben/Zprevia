<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Delegate_events;
use App\Models\Delegate;
use App\Models\Event;

class ParticipantesTable extends Component
{
    public $event;
    public $participantes;
    public $evento_actual;
    public $selectedOption = ''; // Opción seleccionada para ordenamiento

    public function mount($id)
    {
        $this->evento_actual = Delegate_events::where('event', $id)->first();

        $this->event = Event::join('organizers', 'events.organizer', '=', 'organizers.id')
                            ->join('companies', 'organizers.company', '=', 'companies.id')
                            ->select('events.*', 'companies.profile as perfil')
                            ->where('events.id', $this->evento_actual->event)
                            ->first();

        $this->loadParticipantes($id);
    }

    public function loadParticipantes($id)
    {
        // Aplicar ordenamiento si hay una opción seleccionada
        $query = DB::table('delegate_events')
                    ->join('delegates', 'delegate_events.delegate', '=', 'delegates.id')
                    ->join('companies', 'delegates.company', '=', 'companies.id')
                    ->join('events', 'delegate_events.event', '=', 'events.id')
                    ->join('organizers', 'events.organizer', '=', 'organizers.id')
                    ->select('companies.*', 'delegates.name as representante')
                    ->where('delegate_events.event', $id);

        // Aplicar el ordenamiento según la opción seleccionada
        if ($this->selectedOption) {
            switch ($this->selectedOption) {
                case 'Invitados':
                    $query->orderBy('delegates.name', 'asc'); // Reemplaza 'invitados_columna' por el nombre real de la columna
                    break;
                case 'Nombre':
                    $query->orderBy('delegates.name', 'asc'); // Reemplaza 'nombre_columna' por la nombre real de la columna
                    break;
                case 'Mesa':
                    $query->orderBy('delegates.name', 'asc'); // Reemplaza 'mesa_columna' por la nombre real de la columna
                    break;
                case 'Turno':
                    $query->orderBy('delegates.name', 'asc'); // Reemplaza 'turno_columna' por la nombre real de la columna
                    break;
                case 'Hora Creación':
                    $query->orderBy('created_at', 'asc'); // Ordenar por la columna de hora de creación (ajusta según tu estructura)
                    break;
                default:
                    // Ordenar por defecto si la opción no coincide con ninguna de las anteriores
                    $query->orderBy('delegates.name', 'asc');
                    break;
            }
        } else {
            // Ordenar por defecto si no se ha seleccionado ninguna opción
            $query->orderBy('delegates.name', 'asc');
        }

        // Ejecutar la consulta paginada y almacenar el resultado en $participantes
        $this->participantes = $query->get();
    }

    public function setOption($option)
    {
        $this->selectedOption = $option;
        $this->loadParticipantes($this->evento_actual->event); // Recargar la lista de participantes con la nueva opción de ordenamiento
    }

    public function render()
    {
        // Convertir los datos a array antes de pasarlos a la vista
        return view('livewire.participantes-table', [
            'participantes' => $this->participantes->toArray(),
            'evento_actual' => $this->evento_actual->toArray(),
            'event' => $this->event->toArray(),
        ]);
    }
}

