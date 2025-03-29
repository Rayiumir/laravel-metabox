<?php

namespace Rayiumir\LaravelMetabox\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TabMetabox extends Component
{
    public $tabs;
    public $activeTab;
    public $tabPrefix;
    /**
     * Create a new component instance.
     */
    public function __construct($tabs, $activeTab = null, $tabPrefix = 'tab-')
    {
        $this->tabs = $tabs;
        $this->activeTab = $activeTab ?? array_key_first($tabs);
        $this->tabPrefix = $tabPrefix;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.TabMetabox');
    }
}
