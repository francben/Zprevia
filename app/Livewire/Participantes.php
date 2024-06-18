<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company;
use App\Models\Delegate;
use App\Models\Event;
use App\Models\Turn;
use App\Models\Entrevista;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Notifications\EntrevistaSolicitada;
use Illuminate\Support\Facades\Log;

class Participantes extends Component
{
    use WithPagination;

    public $pagado;
    public $evento;
    public $user;
    public $eventoID;
    public $companyId;
    public $companySeleccionado;
    public $turns;
    public $delegate_solicitante;
    public $company_solicitante;
    protected $listeners = [
        'opensModal' => 'open',
    ];
    public $showModal = false;  

    public $delegate;
    public $message;

    public function mount($eventoID)
    {
        $this->eventoID = $eventoID;
        // Obtener el usuario autenticado
        $this->user = Auth::user();
        


        //$this->company = Company::find($companyId);
        //$this->turns = Turn::where('company_id', $companyId)->where('status', 0)->get();
        //$this->delegate = Delegate::where('company_id', $companyId)->first() ?: $this->company->admin;
    }

    public function SolicitarEntrevista($company_id)
    {
        //$this->validate();
        $entrevista = Entrevista::create([
            'event_id' => $this->eventoID,
            'company_id' => $company_id,
            'company_solicitante_id' => $this->user->delegate->companies->id,
            'solicitante_id' => $this->user->delegate->id,
            'estado' => 0,
        ]);

        $company = Company::find($company_id);

        if ($company && $company->user) {
            $company->user->notify(new EntrevistaSolicitada($entrevista));
        }

        $this->dispatch('entrevistaSaved', 'Entrevista solicitada!');
    }




    public function render()
    {
        $this->companyId = 0;
        $eventoid = $this->eventoID;
        // Obtener el evento actual
        $this->evento = Event::with('organizers.companies')->find($eventoid);
        // Validaciones y asignaciones
        if ($this->user->hasPermission('admin', $this->evento->organizers->companies->id)) {
            // Si el usuario es el administrador de la empresa organizadora
            $participantes = Delegate::whereHas('events', function ($query) use ($eventoid) {
                $query->where('event', $eventoid);
            })->where('user', '!=', auth()->id()
            )->with(['companies.entrevistas' => function ($query) {
                $query->where('solicitante_id', auth()->id());
            }])->paginate(10);
            
            $this->delegate_solicitante = $this->user->delegate;
            $this->company_solicitante = Company::where('admin', $this->user->id)->first();
            $this->pagado = true;
        } elseif ($this->user->hasPermission('delegate', $this->evento->organizers->companies->id)) {
            // Si el usuario es un delegado asociado a la empresa organizadora
            $participantes = Delegate::whereHas('events', function ($query) use ($eventoid) {
                $query->where('event', $eventoid)
                      ->where('paid', 1); // Filtrar por evento específico y pagado
            })->where('user', '!=', auth()->id()
            )->with(['companies.entrevistas' => function ($query) {
                $query->where('solicitante_id', auth()->id());
            }])->paginate(10);

            $this->delegate_solicitante = $this->user->delegate;
            $this->company_solicitante = Company::where('id', $this->delegate_solicitante->company)->first();
            
            $this->pagado = true;   
        }else{
            $participantes = Delegate::whereHas('events', function ($query) use ($eventoid) {
                $query->where('event', $eventoid)
                      ->where('paid', 1); // Filtrar por evento específico y pagado
            })->where('user', '!=', auth()->id()
            )->with(['companies.entrevistas' => function ($query) {
                $query->where('solicitante_id', $this->user->delegate->id);
            }])->paginate(10);
            $delegate = $this->user->delegate;

            $this->delegate_solicitante = $delegate;
            $this->company_solicitante = $this->delegate_solicitante->companies;

            $this->pagado = $delegate->events()
                ->where('events.id', $this->eventoID) // Filtrar por el evento específico
                ->wherePivot('paid', 1) // Filtrar por eventos pagados
                ->exists();
        }
        
        return view('livewire.participantes', [
            'participantes' => $participantes,
        ]);
    }
}
