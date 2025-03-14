<?php

namespace Rayiumir\LaravelMetabox\Traits;

use Rayiumir\LaravelMetabox\Models\Metabox;

trait HasMetaboxes
{
    public function metaboxes()
    {
        return $this->morphMany(Metabox::class, 'model');
    }

    public function addMetabox($key, $value)
    {
        return $this->metaboxes()->updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }

    public function getMetabox($key)
    {
        $metabox = $this->metaboxes()->where('key', $key)->first();
        return $metabox ? $metabox->value : null;
    }
}
