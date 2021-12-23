<?php

namespace Escarter\Activitylog;

use Illuminate\Support\ServiceProvider;

class ActivitylogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes/web.php';
        $this->app->make('Escarter\Activitylog\ActivitylogController');

        $this->loadViewsFrom(__DIR__.'/views', 'activitylog');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'activitylog');
         $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/activitylog'),
        ]);

        $this->app->bind('activitylog', function () {
            return new Activitylog();
        });
    }
}
