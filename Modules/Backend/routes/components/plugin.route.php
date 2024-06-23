<?php

use Illuminate\Support\Facades\Route;
use Modules\Backend\Http\Controllers\Plugins\PluginController;

/*
|--------------------------------------------------------------------------
| Plugin routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/plugins', [PluginController::class, "index"])->name('plugins');
Route::post('/plugin/actiate', [PluginController::class, 'activate'])->name('backend.plugin.activate');
Route::post('/plugin/deactivate', [PluginController::class, 'deactivate'])->name('backend.plugin.deactivate');
