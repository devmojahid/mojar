<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Classes\Hooks;
use Illuminate\Support\Facades\Blade;

class HookServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Hooks::class, function () {
            return new Hooks();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Register Blade directives for do action and apply filters
        Blade::directive('doaction', function ($expression) {
            return "<?php do_action({$expression}); ?>";
});

Blade::directive('applyfilters', function ($expression) {
return "<?php echo apply_filters({$expression}); ?>";
});

}
}