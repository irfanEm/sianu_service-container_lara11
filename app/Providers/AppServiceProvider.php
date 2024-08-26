<?php

namespace App\Providers;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Logging\Impl\AdminLoggerImpl;
use App\Logging\Impl\UserLoggerImpl;
use App\Logging\Logger;
use App\Reports\Impl\CpuReport;
use App\Reports\Impl\DiskReport;
use App\Reports\Impl\MemoryReport;
use App\Services\ReportAnalyzer;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\App;
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

        $this->app->when(AdminController::class)
                    ->needs('$nameApp')
                    ->giveConfig('app.name');

        $this->app->bind(CpuReport::class, function() {
            return new CpuReport();
        });

        $this->app->bind(DiskReport::class, function() {
            return new DiskReport();
        });

        $this->app->bind(MemoryReport::class, function(){ 
            return new MemoryReport();
        });

        $this->app->tag([CpuReport::class, MemoryReport::class, DiskReport::class], 'Reports');

        $this->app->bind(ReportAnalyzer::class, function(Application $app) {
            return new ReportAnalyzer(iterator_to_array($app->tagged('Reports')));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
