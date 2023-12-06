<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArduinoController;
use App\Http\Controllers\LogController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('/arduino')->group( function () {
    Route::post('/create', [ArduinoController::class, 'create']);
    Route::post('/', [ArduinoController::class, 'show']);
    Route::get('/', [ArduinoController::class, 'index']);
    Route::get('/water'[LogController::class, 'water']);
    Route::post('/log', [LogController::class, 'store']);
});