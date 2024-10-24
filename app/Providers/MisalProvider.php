<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MisalProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('misal', function($app){
            return "Ini adalah pesan dari MisalProvider";
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
