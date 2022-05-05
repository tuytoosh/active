<?php

namespace Active;

use Illuminate\Support\ServiceProvider as Provider;
use Illuminate\Support\Facades\Blade;

class ServiceProvider extends Provider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('active', function () {
            return new Core();
        });


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . './config.php' => config_path('active.php'),
        ]);

        Blade::directive('active', function ($route, $class = null) {
            return "<?php echo app('active')->active({$route}, {$class}); ?>";
        });
    }
}
