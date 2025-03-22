<?php

namespace Rayiumir\LaravelMetabox\Traits;

use Illuminate\Support\Facades\Storage;
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

    public function uploadImageMetabox($key, $file)
    {
        $oldImage = $this->getMetabox($key);
        if ($oldImage) {
            Storage::disk('public')->delete($oldImage);
        }

        $imagePath = $file->store('uploads', 'public');

        $this->addMetabox($key, $imagePath);

        return $imagePath;
    }
}
