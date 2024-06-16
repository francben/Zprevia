<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\Turn;
use Carbon\Carbon;

class ControlTurnos extends Component
{
    public $eventId;
    public $showNoti;
    public $mensaje = "";
    public $days = [];

    public function mount($eventId)
    {
        $this->eventId = $eventId;
        $this->loadEventDays();
        $this->loadExistingTurns();
    }

    public function loadEventDays()
    {
        $event = Event::find($this->eventId);
        $startDate = Carbon::parse($event->start_date);
        $endDate = Carbon::parse($event->end_date);

        $this->days = [];
        while ($startDate->lte($endDate)) {
            $this->days[] = [
                'date' => $startDate->toDateString(),
                'turns' => []
            ];
            $startDate->addDay();
        }
        $this->showNoti = false;
    }

    public function loadExistingTurns()
    {
        $turns = Turn::where('event', $this->eventId)->orderby('time')->get();

        foreach ($turns as $turn) {
            $date = Carbon::parse($turn->time)->toDateString();
            $time = Carbon::parse($turn->time)->format('H:i');

            foreach ($this->days as &$day) {
                if ($day['date'] == $date) {
                    $day['turns'][] = [
                        'id' => $turn->id,
                        'time' => $time,
                        'showInput' => false,
                        'editing' => true,
                    ];
                    break;
                }
            }
        }
    }

    public function addTurn($dayIndex)
    {
        $this->days[$dayIndex]['turns'][] = [
            'time' => '',
            'showInput' => true,
            'editing' => false,
        ];
    }

    public function confirmTurn($dayIndex, $turnIndex)
    {
        $turnTime = $this->days[$dayIndex]['turns'][$turnIndex]['time'];
        $turnDate = $this->days[$dayIndex]['date'];
        
        if ($this->days[$dayIndex]['turns'][$turnIndex]['editing']) {
            // Editar el turno existente en la base de datos
            $turn = Turn::find($this->days[$dayIndex]['turns'][$turnIndex]['id']);
            $turn->time = Carbon::parse($turnDate . ' ' . $turnTime);
            $turn->save();

            // Reiniciar estado de edición
            $this->days[$dayIndex]['turns'][$turnIndex]['editing'] = true;
            
            $this->dispatch('turnsSaved', 'Turno guardado!');
        } else {
            // Guardar el turno nuevo en la base de datos
            $newTurn = Turn::create([
                'time' => Carbon::parse($turnDate . ' ' . $turnTime),
                'event' => $this->eventId,
            ]);
            $this->days[$dayIndex]['turns'][$turnIndex]['editing'] = true;
            $this->days[$dayIndex]['turns'][$turnIndex]['id'] = $newTurn->id;
            
            $this->dispatch('turnsSaved', 'Turno agregado!');
        }

        $this->days[$dayIndex]['turns'][$turnIndex]['showInput'] = false;
        $this->sortTurns($dayIndex);
    }

    public function deleteTurn($dayIndex, $turnIndex)
    {
        $turn = $this->days[$dayIndex]['turns'][$turnIndex];
        if (isset($turn['id'])) {
            Turn::find($turn['id'])->delete();
        }

        array_splice($this->days[$dayIndex]['turns'], $turnIndex, 1);
        
        $this->dispatch('turnsSaved', 'Turno eliminado!');
    }

    public function editTurn($dayIndex, $turnIndex)
    {
        $this->resetTurnsEditingFlag();
        $this->days[$dayIndex]['turns'][$turnIndex]['editing'] = true;
        $this->days[$dayIndex]['turns'][$turnIndex]['showInput'] = true;
    }

    public function resetTurnsEditingFlag()
    {
        foreach ($this->days as &$day) {
            foreach ($day['turns'] as &$turn) {
                $turn['editing'] = false;
            }
        }
    }

    public function saveTurns()
    {
        foreach ($this->days as $day) {
            foreach ($day['turns'] as $turn) {
                if (isset($turn['id'])) {
                    // Turno existente, ya se guardó al editar o crear
                    continue;
                }
                Turn::create([
                    'event' => $this->eventId,
                    'time' => $day['date'] . ' ' . $turn['time'],
                ]);
            }
        }
        session()->flash('message', 'Turnos guardados exitosamente!');
    }

    public function sortTurns($dayIndex)
    {
        usort($this->days[$dayIndex]['turns'], function ($a, $b) {
            return strtotime($a['time']) - strtotime($b['time']);
        });

        foreach ($this->days[$dayIndex]['turns'] as &$turn) {
            $turn['showInput'] = false;
        }
    }

    public function render()
    {
        return view('livewire.control-turnos');
    }
}
