<?php

namespace App\Classes;
if (!class_exists('Hooks')){
  /**
  * Hooks
  */
  class Hooks
  {
    protected $actions = [];
    protected $filters = [];

    public function addAction($hook, $callback, $priority = 10)
    {
        $this->actions[$hook][$priority][] = $callback;
        ksort($this->actions[$hook]);
    }

    public function doAction($hook, ...$args)
    {
        if (!empty($this->actions[$hook])) {
            foreach ($this->actions[$hook] as $priority => $callbacks) {
                foreach ($callbacks as $callback) {
                    call_user_func_array($callback, $args);
                }
            }
        }
    }

    public function removeAction($hook, $callback, $priority = 10)
    {
        if (isset($this->actions[$hook][$priority])) {
            $this->actions[$hook][$priority] = array_filter($this->actions[$hook][$priority], function ($existingCallback) use ($callback) {
                return $existingCallback !== $callback;
            });
        }
    }

    public function removeAllActions($hook)
    {
        unset($this->actions[$hook]);
    }

    public function addFilter($hook, $callback, $priority = 10)
    {
        $this->filters[$hook][$priority][] = $callback;
        ksort($this->filters[$hook]);
    }

    public function applyFilters($hook, $value, ...$args)
    {
        if (!empty($this->filters[$hook])) {
            foreach ($this->filters[$hook] as $priority => $callbacks) {
                foreach ($callbacks as $callback) {
                    $value = call_user_func_array($callback, array_merge([$value], $args));
                }
            }
        }
        return $value;
    }

    public function removeFilter($hook, $callback, $priority = 10)
    {
        if (isset($this->filters[$hook][$priority])) {
            $this->filters[$hook][$priority] = array_filter($this->filters[$hook][$priority], function ($existingCallback) use ($callback) {
                return $existingCallback !== $callback;
            });
        }
    }

    public function removeAllFilters($hook)
    {
        unset($this->filters[$hook]);
    }

    public function hasAction($hook)
    {
        return !empty($this->actions[$hook]);
    }

    public function hasFilter($hook)
    {
        return !empty($this->filters[$hook]);
    }
   
  }
}