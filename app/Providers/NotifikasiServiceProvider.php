<?php

namespace App\Providers;

use App\Services\EmailNotifier;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class NotifikasiServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(EmailNotifier::class, function($app) {
            return new EmailNotifier();
        });
    }

    public function provides(): array
    {
        return [
            EmailNotifier::class,
        ];
    }
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
