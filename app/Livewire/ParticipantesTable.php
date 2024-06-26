<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\Delegate_events;
use App\Models\Entrevista;
use App\Models\Delegate;
use App\Models\Event;
use App\Models\Turn;

class ParticipantesTable extends Component
{
    use WithPagination;
    public $event;
    public $user;
    public $participantes;
    public $evento_actual;
    public $evento_actual_id;
    public $selectedOption = '';
    public $turnos;
    public $mesa;
    public $selectedTurno;
    public $selectedEntrevistaId;
    protected $rules = [
        'mesa' => 'required',
        'selectedTurno' => 'required'
    ];
    public function mount($id)
    {
        $this->evento_actual_id = $id;
        $this->turnos = Turn::where('event', $id)->where('estado', 0)->get();
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

    public function selectEntrevista($id)
    {
        $this->selectedEntrevistaId = $id;
        $entrevista = Entrevista::find($id);
        $this->mesa = $entrevista->mesa;
        $this->selectedTurno = $entrevista->turno->id ?? null;
    }
    
    public function save()
    {
        $this->validate();

        $entrevista = Entrevista::find($this->selectedEntrevistaId);
        $entrevista->mesa = $this->mesa;
        $entrevista->turno_id = $this->selectedTurno;
        $entrevista->estado = 1; // Cambia el estado a 1
        $entrevista->save();

        $entrevista->turno->estado = 1;
        $entrevista->turno->save();

        // Recargar las entrevistas
        $this->entrevistas = Entrevista::where('event_id', $this->evento_actual->id)
            ->where('company_id', $this->evento_actual->organizers->companies->id )
            ->with(['company', 'representante', 'turno', 'solicitante'])
            ->paginate(10);

        
        $this->selectedEntrevistaId = null;
        $this->dispatch('entrevistaSaved', 'Entrevista aceptada!');
    }

    public function render()
    {
        $this->evento_actual = Event::with('organizers.companies')->find($this->evento_actual_id);
        $this->entrevistas = Entrevista::where('event_id', $this->evento_actual->id)
            ->where('company_id', $this->evento_actual->organizers->companies->id )
            ->with(['company', 'representante', 'turno', 'solicitante'])
            ->paginate(10);

        return view('livewire.participantes-table', [
            'entrevistas' => $this->entrevistas,
        ]);
    }
}

