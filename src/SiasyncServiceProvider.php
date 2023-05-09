<?php

namespace Lighthinkstudio\Siasync;

use Lighthinkstudio\Siasync;
use Illuminate\Support\ServiceProvider;

class SiasyncServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(Siasync::class, function($siasync) {
            return new Siasync;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishes([
            __DIR__.'/../config/siasync.php' => config_path('siasync.php'),
            __DIR__.'/../src/SiasyncServiceProvider.php' => app_path('Providers/SiasyncServiceProvider.php'),
        ]);
    }
}
