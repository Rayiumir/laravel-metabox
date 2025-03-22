<?php

namespace Rayiumir\LaravelMetabox\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImageUploadMetabox extends Component
{
    public $name;
    public $value;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $value = null)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ImageUploadMetabox');
    }
}
