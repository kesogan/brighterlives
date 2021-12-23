<?php

namespace Escarter\Activitylog\Facades;

use Illuminate\Support\Facades\Facade;

class Activitylog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'activitylog';
    }
}
