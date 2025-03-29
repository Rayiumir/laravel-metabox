<?php

namespace Rayiumir\LaravelMetabox\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;

class GalleryMetabox extends Component
{
    public $name;
    public $images;
    public $limit;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $images = [], $limit = 0)
    {
        $this->name = $name;
        $this->images = is_string($images) ? json_decode($images, true) ?? [] : $images;
        $this->limit = $limit;
    }

    public function imageExists($path)
    {
        return Storage::disk('public')->exists($path);
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.GalleryMetabox', [
            'images' => array_filter($this->images, function($path) {
                return $this->imageExists($path);
            })
        ]);
    }
}
