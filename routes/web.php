<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportAnalyzerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/log-admin', [AdminController::class, 'index']);
Route::get('/log-user', [UserController::class, 'index']);
Route::get('/report-analyze', [ReportAnalyzerController::class, 'index']);
