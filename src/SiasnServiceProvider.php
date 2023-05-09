<?php

namespace Lighthinkstudio\Siasn;

use Lighthinkstudio\Siasn;
use Illuminate\Support\ServiceProvider;

class SiasnServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(Siasn::class, function($siasn) {
            return new Siasn;
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
            __DIR__.'/../config/siasn.php' => config_path('siasn.php'),
            __DIR__.'/../src/SiasnServiceProvider.php' => app_path('Providers/SiasnServiceProvider.php'),
        ]);
    }
}
