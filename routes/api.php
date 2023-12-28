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
    Route::post('/', [ArduinoController::class, 'show']);
    Route::get('/', [ArduinoController::class, 'index']);
    Route::post('/create', [ArduinoController::class, 'create']);

    Route::post('/water',[ArduinoController::class, 'water']);
    Route::post('/water/on',[ArduinoController::class, 'water_on']);
    Route::post('/water/off',[ArduinoController::class, 'water_off']);
    Route::post('/water/switch',[ArduinoController::class, 'water_switch']);

    Route::post('/log', [LogController::class, 'store']);
    Route::post('/logs', [LogController::class, 'index']);
    Route::post('/log/recent', [LogController::class, 'recent']);

    Route::post('/image/upload', [ArduinoController::class, 'storeImage']);

    Route::post('/object/upload', [ArduinoController::class, 'storeObject']);
    Route::post('/object', [ArduinoController::class, 'getObject']);
});