<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company;
use App\Models\Delegate;
use App\Models\Turn;
use App\Models\Entrevista;
use Illuminate\Support\Facades\Auth;

class EntrevistaModal extends Component
{
    public $company;
    public $turns = [];
    public $selectedTurn;
    public $delegate;
    public $message;
    public $showModal = false;

    protected $rules = [
        'selectedTurn' => 'required'
    ];    
    protected $listeners = [
        'openModal' => 'open',
    ];

    public function Inimount($companyId)
    {
        $this->company = Company::find($companyId);
        $this->turns = Turn::where('company_id', $companyId)->where('estado', 0)->get();
        $this->delegate = Delegate::where('company', $companyId)->first() ;
    }

    public function submit()
    {
        $this->validate();

        Entrevista::create([
            'company_id' => $this->company->id,
            'solicitante' => Auth::id(),
            'aplicante' => $this->delegate->id,
            'event_id' => $this->company->event_id,
            'turno_id' => $this->selectedTurn,
            'mesa' => '',
            'estado' => 0,
        ]);

        $this->message = 'Solicitud de entrevista enviada correctamente';
        $this->emit('closeModal');
    }
    public function open($id)
    {
        //$this->company = Company::find($id);
        $this->showModal = true;
        dd($id);
    }

    public function close()
    {
        $this->showModal = false;
    }
    public function render()
    {
        return view('livewire.entrevista-modal');
    }
}