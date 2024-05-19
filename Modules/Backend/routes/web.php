<?php

use Illuminate\Support\Facades\Route;
use Modules\Backend\Http\Controllers\BackendController;

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

Route::prefix("admin")->name('admin.')->group(function () {
    Route::get('/', function () {
        return view("backend::layouts.base.master.index");
    })->name('index');
});