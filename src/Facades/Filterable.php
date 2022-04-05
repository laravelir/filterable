<?php

namespace Laravelir\Filterable\Facades;

use Illuminate\Support\Facades\Facade;

class Filterable extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'filterable';
    }
}
