<?php

use App\Http\Controllers\AuthController;
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

// Auth
Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

// Route::apiResource('/user', App\Http\Controllers\UserDetailController::class);
Route::apiResource('/book-detail', App\Http\Controllers\BookingDetailController::class)->middleware('auth:sanctum');
Route::apiResource('/contact', App\Http\Controllers\ContactUserController::class)->middleware('auth:sanctum');
Route::apiResource('/destination', App\Http\Controllers\DestinationController::class)->middleware('auth:sanctum');
Route::apiResource('/destination-photos', App\Http\Controllers\DestinationPhotosController::class)->middleware('auth:sanctum');
Route::apiResource('/payment-summary', App\Http\Controllers\PaymentSummaryController::class)->middleware('auth:sanctum');
Route::apiResource('/popular-trip', App\Http\Controllers\PopularTripController::class)->middleware('auth:sanctum');
Route::apiResource('/travel-agent', App\Http\Controllers\TravelAgentController::class)->middleware('auth:sanctum');
Route::apiResource('/user-detail', App\Http\Controllers\UserDetailController::class)->middleware('auth:sanctum');
