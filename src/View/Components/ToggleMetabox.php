<?php

namespace Rayiumir\LaravelMetabox\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ToggleMetabox extends Component
{
    public $name;
    public $label;
    public $checked;
    public $onValue;
    public $offValue;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $label, $checked = false, $onValue = '1', $offValue = '0')
    {
        $this->name = $name;
        $this->label = $label;
        $this->checked = $checked;
        $this->onValue = $onValue;
        $this->offValue = $offValue;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ToggleMetabox');
    }
}
