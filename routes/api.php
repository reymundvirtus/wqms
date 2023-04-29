<?php

use App\Http\Controllers\AnalyticsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TemperatureController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//? api for sendeng temp into db
Route::post('/insert', [TemperatureController::class, 'insert_temp']);

//? for notification
Route::post('/send-notif', [AnalyticsController::class, 'sendNotification']);