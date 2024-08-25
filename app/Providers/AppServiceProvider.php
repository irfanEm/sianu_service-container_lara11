<?php

namespace App\Providers;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Logging\Impl\AdminLoggerImpl;
use App\Logging\Impl\UserLoggerImpl;
use App\Logging\Logger;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when(AdminController::class)
                    ->needs(Logger::class)
                    ->give(AdminLoggerImpl::class);

        $this->app->when(UserController::class)
                    ->needs(Logger::class)
                    ->give(UserLoggerImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
