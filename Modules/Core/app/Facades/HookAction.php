<?php

namespace Modules\Core\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Core\Contracts\HookActionContract;

class HookAction extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return HookActionContract::class;
    }
}
