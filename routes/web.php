<?php

use App\Dependencys\Services;
use App\Dependencys\PodcastStats;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\FirewallController;
use App\Http\Controllers\DependencyController;
use App\Http\Controllers\helloWorldController;
use App\Http\Controllers\EventPusherController;
use App\Http\Controllers\ReportAnalyzerController;
use App\Http\Controllers\ReportAggregatorController;
use App\Http\Controllers\ServiceProviderController;
use App\Services\SapaNama;
use Psr\Container\ContainerInterface;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/log-admin', [AdminController::class, 'index']);
Route::get('/log-user', [UserController::class, 'index']);
Route::get('/report-analyze', [ReportAnalyzerController::class, 'index']);

Route::post('/event-push', [EventPusherController::class, 'index']);

// akses binding contextual
Route::get('/photo', [PhotoController::class, 'index']);
Route::get('/upload', [UploadController::class, 'index']);
Route::get('/photo', [VideoController::class, 'index']);

// Binding Typed Variadics
Route::get('/variadic', [FirewallController::class, 'filter']);

// Binding Tag variadics
Route::get('/tag-variadic', [ReportAggregatorController::class, 'generateReports']);

// test Dependencys
Route::get('/test-dependencys', [helloWorldController::class, 'test']);
Route::get('/sapa-nama', [DependencyController::class, 'sayHello']);

// test Zero configuration
Route::get('/zero-config', function(Services $services){
    return $services->sayHello();
});

// test Resolve
// method makeWith()
Route::get('/resolve-makewith/{jeneng}', [DependencyController::class, 'makeWith']);

// method invocation & injection
Route::get('/podcast-stats', function(){
    $stats = App::call([new PodcastStats, 'generate']);

    return response()->json($stats);
});

// container events route
Route::get('/container-events', [DependencyController::class, 'containerEvents']);

// psr-11 interface route
Route::get('/psr-11/{nama}', function(ContainerInterface $container, $nama) {
    $sapa = $container->get(SapaNama::class);

    $sapaNama = $sapa->sapa($nama);

    return response()->json([
        'data' => $sapaNama,
    ]);
});

// test register method
Route::get('/register-method', [ServiceProviderController::class, 'testRegisterMethod']);

// test properties $bindings & $singletons
Route::get('/properties-singletons', [ServiceProviderController::class, 'testPropertySingletonsAndBindings']);
