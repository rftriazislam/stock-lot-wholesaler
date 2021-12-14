<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EarnByLearn\ProductController;
use App\Http\Controllers\Payment\PaymentController;
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
Route::post('/singin', [AuthController::class, 'signin']);
Route::post('/signup', [AuthController::class, 'signup']);


Route::middleware(['auth:sanctum'])->group(function () {
    // Route::post('/payment-response', [PaymentController::class, 'paymentresponse']);

});
Route::get('/v1/earn-by-learn/products', [ProductController::class, 'products']);





Route::post('/payment-response', [PaymentController::class, 'paymentresponse']);