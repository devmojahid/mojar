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
        // dd($plugins);
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
        return redirect()->back();
    }

    /**
     * Deactivate the plugin.
     */

    public function deactivate(Request $request)
    {
        $pluginName = $request->get('plugin');
        Plugin::disable($pluginName);
        return redirect()->back();
    }

    /**
     * Delete the plugin.
     */

    public function delete(Request $request)
    {
        $pluginName = $request->get('plugin');
        Plugin::delete($pluginName);
        return redirect()->back();
    }
}
