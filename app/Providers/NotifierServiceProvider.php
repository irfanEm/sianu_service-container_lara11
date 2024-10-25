<?php

namespace App\Providers;

use App\Reports\Notifier;
use App\Reports\Impl\EmailNotifier;
use App\Reports\Impl\SmsNotifier;
use Illuminate\Support\ServiceProvider;

class NotifierServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */

    public $bindings = [
        Notifier::class => EmailNotifier::class,
    ];

    public $singletons = [
        SmsNotifier::class => SmsNotifier::class,
    ];

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
