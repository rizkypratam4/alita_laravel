<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CheckboxInput extends Component
{
    public $label;
    public $col;
    public $name;
    public $value;

    public function __construct($label, $col = 3, $name = null, $value = null)
    {
        $this->label = $label;
        $this->col = $col;
        $this->name = $name;
        $this->value = $value;
    }

    public function render()
    {
        return view('components.checkbox-input');
    }
}
