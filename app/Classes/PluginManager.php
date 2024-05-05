<?php

namespace App\classes;
use App\classes\BasePlugin;

use Exception;
class PluginManager
{

    /**
     * Plugin directory.
     *
     * @var string
     */
    protected $pluginDir;

    /**
     * Plugin namespace.
     *
     * @var string
     */
    protected $pluginNamespace;

    /**
     * Plugin manager constructor.
     *
     * @param string $pluginDir
     * @param string $pluginNamespace
     */
    protected $plugins = [];
    
    /*
    * Register the plugin.
    *
    */
    public function registerPlugin(BasePlugin $plugin)
    {
        $this->plugins[] = $plugin;
    }

    /*
    * Get all registered plugins.
    *
    */
    public function getPlugins()
    {
        return $this->plugins;
    }

    /*
    * Activate Plugin.
    *
    */
    public function activatePlugin(string $pluginName)
    {
        foreach($this->plugins as $plugin)
        {
            if($plugin->getName() === $pluginName)
            {
                $plugin->activate();
                return;
            }
        }

        throw new Exception("Plugin $pluginName not found.");
    }

    /*
    * Deactivate Plugin.
    *
    */
    public function deactivatePlugin(string $pluginName)
    {
        foreach($this->plugins as $plugin)
        {
            if($plugin->getName() === $pluginName)
            {
                $plugin->deactivate();
                return;
            }
        }

        throw new Exception("Plugin $pluginName not found.");
    }

    /*
    * Uninstall Plugin.
    *
    */
    public function uninstallPlugin(string $pluginName)
    {
        foreach($this->plugins as $plugin)
        {
            if($plugin->getName() === $pluginName)
            {
                $plugin->uninstall();
                return;
            }
        }

        throw new Exception("Plugin $pluginName not found.");
    }
}