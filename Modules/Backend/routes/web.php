<?php

use Illuminate\Support\Facades\Route;
use Modules\Backend\Http\Controllers\BackendController;
use Modules\Backend\Http\Controllers\Plugins\PluginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::prefix('admin')->group([], function () {
//     Route::get('/', function () {
//         return view('backend::index');
//     })->name('index');
//     // Route::resource('backend', BackendController::class)->names('backend');
// });

Route::prefix("admin")->middleware(['auth'])
    ->name('admin.')->group(function () {
        // route file require.
        require __DIR__ . '/components/plugin.route.php';
        Route::get('/dashboard', function () {
            return view("backend::backend.dashboard");
        })->name('dashboard');
    });

Route::prefix("admin")->name('admin.')->group(function () {
    require __DIR__ . '/components/auth.route.php';
});
