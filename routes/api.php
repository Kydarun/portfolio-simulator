<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ExperimentController;
use App\Http\Controllers\Api\InstrumentController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\RunController;
use App\Http\Controllers\Api\TradeController;

Route::apiResource('experiments', ExperimentController::class);
Route::apiResource('instruments', InstrumentController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('runs', RunController::class);
Route::apiResource('trades', TradeController::class);
