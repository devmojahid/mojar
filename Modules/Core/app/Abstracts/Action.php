<?php

namespace Modules\Core\Abstracts;

abstract class Action
{
    public const BACKEND_CALL_ACTION = 'backend_call_action';

    public function __construct()
    {
        // 
    }

    abstract public function handle();
}
