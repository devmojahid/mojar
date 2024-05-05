<?php
use App\Classes\Hooks;

/**
 * Trigger an filtes. [add Filter]
 */
if (!function_exists('add_filter')) {
    function add_filter($hook, $callback, $priority = 10)
    {
        app(Hooks::class)->addFilter($hook, $callback, $priority);
    }
}

/**
 * Apply an filter. [apply filter]
 */
if (!function_exists('apply_filters')) {
    function apply_filters($hook, $value, ...$args)
    {
        return app(Hooks::class)->applyFilters($hook, $value, ...$args);
    }
}

/**
 * Remove an filter. [remove filter]
 */
if (!function_exists('remove_filter')) {
    function remove_filter($hook, $callback, $priority = 10)
    {
        app(Hooks::class)->removeFilter($hook, $callback, $priority);
    }
}

/**
 * Remove all filters. [remove all filters]
 */
if (!function_exists('remove_all_filters')) {
    function remove_all_filters($hook)
    {
        app(Hooks::class)->removeAllFilters($hook);
    }
}

/**
 * hasFilter filter hook. [hasFilter]
 */
if (!function_exists('has_filter')) {
    function has_filter($hook)
    {
        return isset(app(Hooks::class)->filters[$hook]);
    }
}