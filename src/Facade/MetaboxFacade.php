<?php

namespace Rayiumir\LaravelMetabox\Facade;

use Illuminate\Support\Facades\Facade;

class MetaboxFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'Metabox';
    }
}
