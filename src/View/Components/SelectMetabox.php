<?php

namespace Rayiumir\LaravelMetabox\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectMetabox extends Component
{
    public $name;
    public $options;
    public $selected;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $options, $selected = null)
    {
        $this->name = $name;
        $this->options = $options;
        $this->selected = $selected;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.SelectMetabox');
    }
}
