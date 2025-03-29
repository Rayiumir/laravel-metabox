<?php

namespace Rayiumir\LaravelMetabox\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioMetabox extends Component
{
    public $name;
    public $options;
    public $selected;
    public $orientation;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $options, $selected = null, $orientation = 'vertical')
    {
        $this->name = $name;
        $this->options = $options;
        $this->selected = $selected;
        $this->orientation = $orientation;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.RadioMetabox');
    }
}
