<?php

namespace Rayiumir\LaravelMetabox\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CheckboxMetabox extends Component
{
    public $name;
    public $label;
    public $checked;
    public $value;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $label, $checked = false, $value = '1')
    {
        $this->name = $name;
        $this->label = $label;
        $this->checked = $checked;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.CheckboxMetabox');
    }
}
