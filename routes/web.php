<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileSettings;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController as ProductFront;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and will be assigned to the "web" middleware group.
| Make something great!
|
*/

Route::get('admin', [AuthController::class, 'login_admin']);
Route::post('admin', [AuthController::class, 'auth_login_admin']);
Route::get('admin/logout', [AuthController::class, 'logout_admin']);



Route::group(['middleware' => 'admin'], function() {


    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);


    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::get('admin/order/list', [AdminController::class, 'orderList']);
    Route::get('admin/order/approve/{id}', [AdminController::class, 'approve'])->name('admin.order.approve');
    Route::delete('admin/order/cancel-approval/{id}', [AdminController::class, 'cancelApproval'])->name('cancel.approval');
    Route::delete('admin/order/delete/{id}', [AdminController::class, 'deleteOrder'])->name('order.delete');
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);

    Route::get('admin/user/list', [UserController::class, 'index']);
    Route::get('admin/user/add', [UserController::class, 'add']);
    Route::post('admin/user/add', [UserController::class, 'insert']);
    Route::get('admin/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('admin/user/edit/{id}', [UserController::class, 'update']);
    Route::get('admin/user/delete/{id}', [UserController::class, 'delete']);


    Route::get('admin/category/list', [CategoryController::class, 'list']);
    Route::get('admin/category/add', [CategoryController::class, 'add']);
    Route::post('admin/category/add', [CategoryController::class, 'insert']);
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('admin/category/edit/{id}', [CategoryController::class, 'update']);
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);


    Route::get('admin/sub_category/list', [SubCategoryController::class, 'list']);
    Route::get('admin/sub_category/add', [SubCategoryController::class, 'add']);
    Route::post('admin/sub_category/add', [SubCategoryController::class, 'insert']);
    Route::get('admin/sub_category/edit/{id}', [SubCategoryController::class, 'edit']);
    Route::post('admin/sub_category/edit/{id}', [SubCategoryController::class, 'update']);
    Route::get('admin/sub_category/delete/{id}', [SubCategoryController::class, 'delete']);


    Route::post('admin/get_sub_category', [SubCategoryController::class, 'get_sub_category']);


    Route::get('admin/brand/list', [BrandController::class, 'list']);
    Route::get('admin/brand/add', [BrandController::class, 'add']);
    Route::post('admin/brand/add', [BrandController::class, 'insert']);
    Route::get('admin/brand/edit/{id}', [BrandController::class, 'edit']);
    Route::post('admin/brand/edit/{id}', [BrandController::class, 'update']);
    Route::get('admin/brand/delete/{id}', [BrandController::class, 'delete']);


    Route::get('admin/color/list', [ColorController::class, 'list']);
    Route::get('admin/color/add', [ColorController::class, 'add']);
    Route::post('admin/color/add', [ColorController::class, 'insert']);
    Route::get('admin/color/edit/{id}', [ColorController::class, 'edit']);
    Route::post('admin/color/edit/{id}', [ColorController::class, 'update']);
    Route::get('admin/color/delete/{id}', [ColorController::class, 'delete']);


    Route::get('admin/product/list', [ProductController::class, 'list']);
    Route::get('admin/product/add', [ProductController::class, 'add']);
    Route::post('admin/product/add', [ProductController::class, 'insert']);
    Route::get('admin/product/edit/{id}', [ProductController::class, 'edit']);
    Route::post('admin/product/edit/{id}', [ProductController::class, 'update']);
    Route::get('admin/product/delete/{id}', [ProductController::class, 'delete']);


    Route::get('admin/product/image_delete/{id}', [ProductController::class, 'image_delete']);


    Route::post('admin/product_image_sortable', [ProductController::class, 'product_image_sortable']);



});

// Authentication Routes
Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::get('user/logout', [ProfileController::class, 'logout_user']);

// Registration Routes
Route::get('register', [RegistrationController::class, 'create'])->name('register');
Route::post('register', [RegistrationController::class, 'store']);

// Profile Routes
Route::get('profile', [ProfileController::class, 'show'])->name('profile');
Route::get('user/profile_settings', [ProfileSettings::class, 'index']);
Route::post('user/update-profile/{id}', [ProfileSettings::class, 'updateProfile'])->name('update.profile');
Route::post('user/update-password/{id}', [ProfileSettings::class, 'updatePassword'])->name('update.password');
Route::delete('user/delete-account/{id}', [ProfileSettings::class, 'deleteAccount'])->name('delete.account');

// Public Routes
Route::get('/', [HomeController::class, 'home']);
Route::get('about', [HomeController::class, 'about']);

Route::get('cart', [PaymentController::class, 'cart']);
Route::post('update_cart', [PaymentController::class, 'update_cart']);
Route::get('cart/delete/{id}', [PaymentController::class, 'cart_delete']);
Route::delete('cart-all-delete', [PaymentController::class, 'cartAllDelete']);
Route::get('checkout', [PaymentController::class, 'checkout']);

Route::post('product/add-to-cart', [PaymentController::class, 'add_to_cart']);

Route::get('search', [ProductFront::class, 'getProductSearch']);
Route::post('get_filter_product_ajax', [ProductFront::class, 'getFilterProductAjax']);
Route::get('{category?}/{subcategory?}', [ProductFront::class, 'getCategory']);
Route::delete('/place-order', [OrderController::class, 'add'])->name('place-order');
Route::delete('/cancel-order/{id}', [OrderController::class, 'cancelOrder'])->name('cancel.order');

