<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\JasaController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\TransactionController;
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

Route::middleware('auth:sanctum')->group(function(){
    Route::get('products', [ProductController::class, 'index']);
    Route::get('jasas', [JasaController::class, 'index']);
    Route::post('addToCart', [CartController::class, 'addToCart']);
    Route::get('cart', [CartController::class, 'cart']);
    Route::post('remove-cart', [CartController::class, 'destroyCart']);
    Route::post('increment-cart', [CartController::class, 'incrementQuantity']);
    Route::post('decrement-cart', [CartController::class, 'decrementQuantity']);
    Route::get('transaction', [TransactionController::class, 'getTransactionByUser']);
    Route::post('checkout', [TransactionController::class, 'checkout']);
    Route::get('transactions', [TransactionController::class, 'getTransactionByUser']);
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
