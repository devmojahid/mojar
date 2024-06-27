<?php

namespace Modules\Core\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Core\Contracts\ActionRegisterContract;

class ActionRegister extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ActionRegisterContract::class;
    }
}
