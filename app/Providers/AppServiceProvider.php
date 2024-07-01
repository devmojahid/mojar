<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Contracts\GlobalDataContract;
use Modules\Core\Contracts\HookActionContract;
use Modules\Core\Supports\HookAction;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
