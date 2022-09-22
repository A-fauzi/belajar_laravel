<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::apiResource('/user', App\Http\Controllers\UserDetailController::class);
Route::apiResource('/book-detail', App\Http\Controllers\BookingDetailController::class);
Route::apiResource('/contact', App\Http\Controllers\ContactUserController::class);
Route::apiResource('/destination', App\Http\Controllers\DestinationController::class);
Route::apiResource('/destination-photos', App\Http\Controllers\DestinationPhotosController::class);
Route::apiResource('/payment-summary', App\Http\Controllers\PaymentSummaryController::class);
Route::apiResource('/popular-trip', App\Http\Controllers\PopularTripController::class);
Route::apiResource('/travel-agent', App\Http\Controllers\TravelAgentController::class);
Route::apiResource('/user-detail', App\Http\Controllers\UserDetailController::class);
