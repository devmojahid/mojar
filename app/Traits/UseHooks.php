<?php

namespace App\Traits;

use App\Classes\Hooks;

trait UseHooks
{
    public function do_action($hook, ...$args){
        app(Hooks::class)->doAction($hook, ...$args);
    }

    public function add_action($hook, $callback, $priority = 10){
        app(Hooks::class)->addAction($hook, $callback, $priority);
    }

    public function remove_action($hook, $callback, $priority = 10){
        app(Hooks::class)->removeAction($hook, $callback, $priority);
    }

    public function remove_all_actions($hook){
        app(Hooks::class)->removeAllActions($hook);
    }

    public function has_action($hook){
        return isset(app(Hooks::class)->actions[$hook]);
    }

    public function add_filter($hook, $callback, $priority = 10){
        app(Hooks::class)->addFilter($hook, $callback, $priority);
    }

    public function apply_filters($hook, $value, ...$args){
        return app(Hooks::class)->applyFilters($hook, $value, ...$args);
    }

    public function remove_filter($hook, $callback, $priority = 10){
        app(Hooks::class)->removeFilter($hook, $callback, $priority);
    }

    public function remove_all_filters($hook){
        app(Hooks::class)->removeAllFilters($hook);
    }

    public function has_filter($hook){
        return isset(app(Hooks::class)->filters[$hook]);
    }
}