<?php

namespace Modules\Backend\Http\Controllers\Plugins;

use Illuminate\Routing\Controller;
use Modules\Core\Facades\Plugin;
use Illuminate\Http\Request;

class PluginController extends Controller
{
    public function index()
    {
        $plugins = Plugin::all();
        $count = Plugin::count();
        return view("backend::backend.plugin.index", compact("plugins", "count"));
    }

    /**
     * Activate the plugin. 
     * 
     */

    public function activate(Request $request)
    {
        $pluginName = $request->get('plugin');
        Plugin::enable($pluginName);
        $plugin = Plugin::find($pluginName);
        return redirect()->back();
    }

    /**
     * Deactivate the plugin.
     */

    public function deactivate(Request $request)
    {
        $pluginName = $request->get('plugin');
        Plugin::disable($pluginName);
        $plugin = Plugin::find($pluginName);
        return redirect()->back();
    }
}
