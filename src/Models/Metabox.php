<?php

namespace Rayiumir\LaravelMetabox\Models;

use Illuminate\Database\Eloquent\Model;

class Metabox extends Model
{
    protected $fillable = [
        'model_type',
        'model_id',
        'key',
        'value'
    ];

    public function model(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }
}
