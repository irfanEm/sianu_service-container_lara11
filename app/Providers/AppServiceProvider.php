<?php

namespace App\Providers;

use App\Logging\Logger;
use App\Services\Transistor;
use App\Contracts\EventPusher;
use App\Services\S3Filesystem;
use App\Reports\Impl\CpuReport;
use App\Services\PodcastParser;
use App\Reports\Impl\DiskReport;
use App\Services\PaymentService;
use App\Services\ReportAnalyzer;
use App\Services\LocalFilesystem;
use App\Reports\Impl\MemoryReport;
use Illuminate\Support\Facades\App;
use App\Logging\Impl\UserLoggerImpl;
use App\Logging\Impl\AdminLoggerImpl;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Application;
use App\Services\LoggingPaymentService;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\UploadController;
use App\Contracts\ContractsImpl\RedistEventPusher;
use App\Contracts\EventFiler;
use App\Filter\Filter;
use App\Filter\FilterImpl\NullFilter;
use App\Filter\FilterImpl\ProfanityFilter;
use App\Filter\FilterImpl\ToLoongFilter;
use App\Reports\Report;
use App\Services\AudioProcessor;
use App\Services\Equalizer;
use App\Services\Firewall;
use App\Services\ReportAggregator;

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

        // Contoh Tagging
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

        // $this->app->bind(ReportAnalyzer::class, function(Application $app) {
        //     return new ReportAnalyzer(iterator_to_array($app->tagged('Reports')));
        // });


        // Extending Bindings

        $this->app->extend(PaymentService::class, function(PaymentService $paymentService, Application $app){
            return new LoggingPaymentService($paymentService);
        });

        // Singletons & singletonsIf Method

        // $this->app->singleton(PodcastParser::class, function(){
        //     return new PodcastParser();
        // });

        // $this->app->singleton(Transistor::class, function(Application $app){
        //     return new Transistor($app->make(PodcastParser::class));
        // });

        // $this->app->singletonIf(Transistor::class, function(Application $app){
        //     return new Transistor($app->make(PodcastParser::class));
        // });

        // scoped method

        // $this->app->scoped(Transistor::class, function(Application $app){
        //     return new Transistor($app->make(PodcastParser::class));
        // });


        // Binding Instance

        $podcastParser = new PodcastParser();
        $transistor = new Transistor($podcastParser);

        $this->app->instance(Transistor::class, $transistor);


        // Binding Interface to Implementation

        $this->app->bind(EventPusher::class, RedistEventPusher::class);


        // contextual Binding

        $this->app->when(PhotoController::class)
                    ->needs(EventFiler::class)
                    ->give(LocalFilesystem::class);

        $this->app->when([UploadController::class,VideoController::class])
                    ->needs(EventFiler::class)
                    ->give(S3Filesystem::class);

        $this->app->when(Firewall::class)
                    ->needs(Filter::class)
                    ->give([
                            NullFilter::class,
                            ProfanityFilter::class,
                            ToLoongFilter::class,
                        ]);

        $this->app->when(ReportAggregator::class)
                    ->needs(Report::class)
                    ->giveTagged("Reports");
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->resolving(AudioProcessor::class, function(AudioProcessor $audioProcessor) {
            $audioProcessor->setSampleRate(1997);
        });

        $this->app->resolving(Equalizer::class, function(Equalizer $equalizer) {
            $equalizer->setFrequency(2711);
        });
    }
}
