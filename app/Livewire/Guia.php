<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PrivacyPolicy;

class Guia extends Component
{
    public $policyContent;
    public $isEditing = false;
    protected $rules = [
        'policyContent' => 'required',
    ];
    public function mount($content = '')
    {
        $latestPolicy = PrivacyPolicy::latest()->first();
        if ($latestPolicy) {
            $this->policyContent = $latestPolicy->content;
        } else {
            $this->policyContent = '';
        }
    }
    public function loadPolicyContent()
    {
        $latestPolicy = PrivacyPolicy::latest()->first();

        if ($latestPolicy) {
            $this->policyContent = $latestPolicy->content;
        } else {
            $this->policyContent = '';
        }
    }
    public function savePolicyContent()
    {
        $this->validate();
        $latestPolicy = PrivacyPolicy::latest()->first();

        if ($latestPolicy) {
            $latestPolicy->update([
                'content' => $this->policyContent,
            ]);
        } else {
            PrivacyPolicy::create([
                'content' => $this->policyContent,
            ]);
        }

        //$this->loadPolicyContent(); // Recargar el contenido después de guardar
        $this->isEditing = false; // Ocultar el editor después de guardar
        session()->flash('success', '¡Contenido de política de privacidad actualizado con éxito!');
    }
    public function render()
    {
        return view('livewire.guia');
    }
}
