<?php
use App\Classes\Hooks;

/**
 * Trigger an action. [do action]
 */

if (!function_exists('do_action')) {
    function do_action($hook, ...$args)
    {
        app(Hooks::class)->doAction($hook, ...$args);
    }
}

/**
 * Add an action. [add action]
 */

if (!function_exists('add_action')) {
    function add_action($hook, $callback, $priority = 10)
    {
        app(Hooks::class)->addAction($hook, $callback, $priority);
    }
}


/**
 * Remove an action. [remove action]
 */

if (!function_exists('remove_action')) {
    function remove_action($hook, $callback, $priority = 10)
    {
        app(Hooks::class)->removeAction($hook, $callback, $priority);
    }
}

/**
 * Remove all actions. [remove all actions]
 */

if (!function_exists('remove_all_actions')) {
    function remove_all_actions($hook)
    {
        app(Hooks::class)->removeAllActions($hook);
    }
}

/**
 * hasAction action hook. [hasAction]
 */

if (!function_exists('has_action')) {
    function has_action($hook)
    {
        return isset(app(Hooks::class)->actions[$hook]);
    }
}