<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AvisoL;

class AvisoLegal extends Component
{
    public $isEditing = false;
    public $avisoContent;
    protected $rules = [
        'avisoContent' => 'required',
    ];
    public function mount($content = '')
    {
        $latestPolicy = AvisoL::latest()->first();
        if ($latestPolicy) {
            $this->avisoContent = $latestPolicy->content;
        } else {
            $this->avisoContent = '';
        }
    }
    public function loadavisoContent()
    {
        $latestPolicy = AvisoL::latest()->first();

        if ($latestPolicy) {
            $this->avisoContent = $latestPolicy->content;
        } else {
            $this->avisoContent = '';
        }
    }
    public function saveavisoContent()
    {
        $this->validate();
        $latestPolicy = AvisoL::latest()->first();

        if ($latestPolicy) {
            $latestPolicy->update([
                'content' => $this->avisoContent,
            ]);
        } else {
            AvisoL::create([
                'content' => $this->avisoContent,
            ]);
        }

        //$this->loadavisoContent(); // Recargar el contenido después de guardar
        $this->isEditing = false; // Ocultar el editor después de guardar
        session()->flash('success', '¡Contenido de política de privacidad actualizado con éxito!');
    }
    public function render()
    {
        return view('livewire.aviso-legal');
    }
}
