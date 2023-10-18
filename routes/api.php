<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ConnoteController;
use App\Http\Controllers\CustomerAttributeController;
use App\Http\Controllers\OriginDataController;
use App\Http\Controllers\DestinationDataController;
use App\Http\Controllers\KoliCustomFieldController;
use App\Http\Controllers\KoliDataController;
use App\Http\Controllers\CustomFieldController;
use App\Http\Controllers\CurrentLocationController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('orders', OrderController::class);
Route::apiResource('connotes', ConnoteController::class);
Route::apiResource('customer_attributes', CustomerAttributeController::class);
Route::apiResource('origin_datas', OriginDataController::class);
Route::apiResource('destination_datas', DestinationDataController::class);
Route::apiResource('koli_custom_fields', KoliCustomFieldController::class);
Route::apiResource('koli_datas', KoliDataController::class);
Route::apiResource('custom_fields', CustomFieldController::class);
Route::apiResource('current_locations', CurrentLocationController::class);
