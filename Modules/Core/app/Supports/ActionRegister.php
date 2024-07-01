<?php

namespace Modules\Core\Supports;

use Illuminate\Cache\CacheManager;
use Illuminate\Contracts\Foundation\Application;
use Modules\Core\Contracts\ActionRegisterContract;

class ActionRegister implements ActionRegisterContract
{

    protected CacheManager $cache;

    protected array $actions = [];

    public function __construct(Application $app)
    {
        $this->cache = $app['cache'];
    }

    public function init(): void
    {
        foreach ($this->actions as $action) {
            app($action, [])->handle();
        }
    }

    public function register(array|string $actions)
    {
        if (!is_array($actions)) {
            $actions = [$actions];
        }

        foreach ($actions as $item) {
            $this->actions[] = $item;
        }
    }


    // public function registerAction(string $action, string $hook, int $priority = 10, int $args = 1): void
    // {
    //     add_action($hook, $action, $priority, $args);
    // }
}
