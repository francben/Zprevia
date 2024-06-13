<?php

namespace App\Livewire;

use Livewire\Component;
use Endroid\QrCode\Builder\Builder;
use App\Models\Event;

class EventosDisponibles extends Component
{
    public $eventos;
    public $organizador;
    public Event $vent;
    public $qrCode;

    public function verDetalleEvento(Event $event){
        $this->$event = $event;
        $result = Builder::create()
                ->data($event->name . ' - ' . $event->date)
                ->size(150)
                ->margin(10)
                ->build();
        $this->qrCode = $result->getDataUri();
        $this->dispatch('open-modal', name : 'ver-Evento');
    }
    
    public function render()
    {
        $this->eventos = Event::with('organizers.companies')->get();
        return view('livewire.eventos-disponibles');
    }
}
