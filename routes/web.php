<?php

use App\Http\Controllers\auth\login\LoginController;
use App\Http\Controllers\auth\login\RegisterController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\products\ProductController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\users\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//auth check route group
// admin panel routes     
Route::middleware(['isAuth'])->prefix('backend/admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('backend.dashboard');
    Route::get('/sign-out', [LoginController::class, 'signout'])->name('backend.user.logout');
    //products
    Route::get('/products', [ProductController::class, 'index'])->name('backend.products');
    Route::get('/products/add', [ProductController::class, 'add_product'])->name('backend.product.add');
});
//auth check route group
// user panel routes     
Route::middleware(['isAuth'])->prefix('user')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('user.profile');
});
//do not check auth
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/backend/auth/admin/login', [LoginController::class, 'login_page'])->name('admin.login');
Route::post('/backend/auth/admin/login/action', [LoginController::class, 'login_action'])->name('admin.login.action');
Route::get('/backend/auth/admin/register', [RegisterController::class, 'register_page'])->name('admin.register');
Route::post('/backend/auth/admin/register/action', [RegisterController::class, 'register_action'])->name('admin.register.action');

