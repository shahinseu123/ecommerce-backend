<?php

use App\Http\Controllers\api\auth\LoginController;
use App\Http\Controllers\api\auth\RatingController;
use App\Http\Controllers\api\auth\UserUpdateController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\coupon\CouponController;
use App\Http\Controllers\api\GeneralController;
use App\Http\Controllers\api\order\OrderController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\wish\WishListController;
use App\Http\Controllers\auth\login\LoginController as LoginLoginController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/auth/user', [LoginController::class, 'user']);
    Route::post('/auth/logout', [LoginController::class, 'logout']);
    Route::post('/auth/order', [OrderController::class, 'create_order']);
    Route::post('/auth/wish/make-wish/{id}', [WishListController::class, 'wish']);
    Route::get('/auth/wish/make-wish', [WishListController::class, 'get_wish']);
    Route::post('/auth/user/update-info', [UserUpdateController::class, 'update_userInfo']);
    Route::post('/auth/user/update-password', [UserUpdateController::class, 'update_password']);
    Route::post('/review/make-review', [RatingController::class, 'create_review']);
    Route::get('/review/get-review/{id}', [RatingController::class, 'get_review']);
    Route::post('/coupon/used', [CouponController::class, 'coupon_used']);
});

Route::post('/auth/login', [LoginController::class, 'login']);
Route::post('/auth/register', [LoginController::class, 'register']);
// product 
Route::get('/all-product', [ProductController::class, 'get_all_product']);
Route::get('/sorted-product', [ProductController::class, 'getSortedProducts']);
//category
Route::get('/all-category', [CategoryController::class, 'get_all_category']);
//General items
Route::get('/slider', [GeneralController::class, 'get_slider']);
Route::get('/brands', [GeneralController::class, 'get_brands']);
Route::get('/coupon', [CouponController::class, 'get_coupons']);
