<?php

use Illuminate\Support\Facades\Route;
use Modules\Backend\Http\Controllers\Plugins\PluginController;
use Modules\Backend\Http\Controllers\Auth\ForgotPasswordController;
use Modules\Backend\Http\Controllers\Auth\LoginController;
use Modules\Backend\Http\Controllers\Auth\RegisterController;
use Modules\Backend\Http\Controllers\Auth\ResetPasswordController;
use Modules\Backend\Http\Controllers\Auth\SocialLoginController;


/*
|--------------------------------------------------------------------------
| Auth routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::group(
//     [
//         'middleware' => 'guest',
//     ],
//     function () {
//     }
// );

Route::get("login", [LoginController::class, "index"])->name('login');
Route::post("login", [LoginController::class, "store"])->name('login');

Route::get("register", [RegisterController::class, "index"])->name('register');
Route::post("register", [RegisterController::class, "store"])->name('register');

Route::get("forgot-password", [ForgotPasswordController::class, "index"])->name('forgot-password');
Route::post("/forgot-password", [ForgotPasswordController::class, "store"])->name('forgot-password');
Route::get("/reset-password/{email}/{token}", [ResetPasswordController::class, "resetPassword"])->name('reset-password');
Route::post("/reset-password/{email}/{token}", [ResetPasswordController::class, "reset"])->name('reset-password');

Route::get('/auth/{provider}/callback', [SocialLoginController::class, 'handleProviderCallback'])->name('auth.social.callback');
Route::get('/auth/{provider}/redirect', [SocialLoginController::class, 'redirectToProvider'])->name('auth.social.redirect');
