<?php

namespace SalatNotifier;

use Illuminate\Support\ServiceProvider;

class SalatNotifierServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register the SalatTimeManager interface binding
        $this->app->singleton('SalatNotifier\Interfaces\SalatTimeManagerInterface', function ($app) {
            return new SalatTimeManager();
        });
    }

    public function boot()
    {
        // Load and publish configuration files
        $this->publishes([
            __DIR__ . '/../config/salat.php' => config_path('salat.php'),
        ]);

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Load and publish routes, if any
        // $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }
}
