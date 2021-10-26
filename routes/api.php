<?php

use App\Http\Controllers\orderController;
use App\Http\Controllers\updateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('versiyon', [updateController::class, 'versiyon']);
Route::post('update', [updateController::class, 'projekoducheck']);
Route::post('download', [updateController::class, 'downloads']);
Route::post('success', [updateController::class, 'success']);

Route::post('orders', [orderController::class, 'orders']);
