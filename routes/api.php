<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\API\Controllers\Subscriber\SubscriberController;
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



/** Authenticated rotues */
Route::middleware('auth:sanctum')
->group(function () {
    
    /** Subscriber */
    Route::apiResource('subscriber', SubscriberController::class);
    
});
