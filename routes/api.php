<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\PaymentApiController;
use App\Http\Controllers\Admin\Api\AdminApiController;
use App\Http\Controllers\ApiUserController;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\Api\ProductApiController as ProductFront;


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


Route::post('/users/login', [ApiUserController::class, 'login']);
Route::apiResource('users', ApiUserController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::prefix('user')->group(function () {
    Route::post('/register', [ApiAuthController::class, 'register']);
    Route::post('/login', [ApiAuthController::class, 'login']);
    Route::post('/logout', [ApiAuthController::class, 'logout']);
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthApiController::class, 'login_admin']);
    Route::post('/login', [AuthApiController::class, 'auth_login_admin']);
    Route::post('/logout', [AuthApiController::class, 'logout_admin']);

    Route::get('/admin/list', [AdminApiController::class, 'list']);
    Route::post('/admin/add', [AdminApiController::class, 'insert']);
    Route::get('/admin/edit/{id}', [AdminApiController::class, 'edit']);
    Route::put('/admin/update/{id}', [AdminApiController::class, 'update']);
    Route::delete('/admin/delete/{id}', [AdminApiController::class, 'delete']);
});

Route::middleware('api')->group(function () {
    Route::get('/products', [ProductFront::class, 'getProductSearch'])->name('api.products.search');
    Route::get('/products/{category?}/{subcategory?}', [ProductFront::class, 'getCategory'])->name('api.products.category');

    Route::get('/cart', [PaymentApiController::class, 'cart']);
    Route::post('/update_cart', [PaymentApiController::class, 'update_cart']);
    Route::delete('/cart/delete/{id}', [PaymentApiController::class, 'cart_delete']);
    Route::get('/checkout', [PaymentApiController::class, 'checkout']);
    Route::post('/product/add-to-cart', [PaymentApiController::class, 'add_to_cart']);

    Route::post('/orders', [OrderController::class, 'create']);
    Route::get('/orders/{orderId}', [OrderController::class, 'show']);
});






