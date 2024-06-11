<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Inputselect extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct($options = [])
    {
        $this->options = $options;
    }

    public function render()
    {
        return view('components.inputselect');
    }
}
