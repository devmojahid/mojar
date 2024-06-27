<?php

namespace Modules\Core\Contracts;

interface ActionRegisterContract
{
    /**
     * Register Action
     *
     * @param string $action
     * @param string $hook
     * @param int $priority
     * @param int $args
     * @return void
     */
    // public function registerAction(string $action, string $hook, int $priority = 10, int $args = 1): void;
}
