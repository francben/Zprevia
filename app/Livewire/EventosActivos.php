<?php

namespace App\Livewire;

use Livewire\Component;
use Endroid\QrCode\Builder\Builder;
use App\Models\Event;
use Carbon\Carbon;

class EventosActivos extends Component
{
    public $eventos;
    public $organizador;
    public $eventoSeleccionado;
    public $qrCode;

    public function verDetalleEvento(Event $event){
        $this->eventoSeleccionado = $event;
        $startDate = Carbon::parse($event->start_date);
        $endDate = Carbon::parse($event->end_date); // Corrección aquí

        if($startDate->isSameDay($endDate)) { // Uso de isSameDay para comparar fechas
            $data = $event->name . "\nFecha: " . $startDate->locale('es')->isoFormat('DD [de] MMMM [del] YYYY') . "\nLocalidad: " . $event->locality . "\nUbicación: " . $event->place;
        } else {
            $data = $event->name . "\nFecha: " . $startDate->locale('es')->isoFormat('DD') . " al " . $endDate->locale('es')->isoFormat('DD [de] MMMM [de] YYYY') . "\nLocalidad: " . $event->locality . "\nUbicación: " . $event->place;
        }

        $result = Builder::create()
                ->data($data)
                ->size(150)
                ->margin(0)
                ->build();
        $this->qrCode = $result->getDataUri();
        $this->dispatch('open-modal', name : 'ver-Evento');
    }

    
    public function render()
    {
        $this->eventos = Event::where('active', true)->with('organizers.companies')->orderBy('start_date', 'asc')->get();
        return view('livewire.eventos-activos');
    }
}
