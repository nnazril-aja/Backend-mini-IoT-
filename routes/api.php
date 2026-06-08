<?php

use App\Http\Controllers\Api\DeviceController;
use App\Http\Controllers\Api\SensorReadingController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/devices', [DeviceController::class, 'index']);
Route::post('/devices', [DeviceController::class, 'store']);

Route::post('/sensorReadings', [SensorReadingController::class, 'store']);
Route::get('/sensorReadings', [SensorReadingController::class, 'index']);
Route::get('/sensorReadings/latest', [SensorReadingController::class, 'latest']);
Route::get('/dashboard/summary', [SensorReadingController::class, 'summary']);