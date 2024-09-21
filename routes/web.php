<?php

use App\Dependencys\Services;
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
