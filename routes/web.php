<?php

use App\Http\Controllers\auth\login\LoginController;
use App\Http\Controllers\auth\login\RegisterController;
use App\Http\Controllers\backend\category\CategoryController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\media\MediaController;
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
    //category
    Route::get('/category', [CategoryController::class, 'index'])->name('backend.category');
    Route::get('/category/add', [CategoryController::class, 'add_category'])->name('backend.category.add');
    Route::post('/category/create', [CategoryController::class, 'create_category'])->name('backend.category.create');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete_category'])->name('category.delete');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit_category'])->name('category.edit');
    Route::post('/category/update', [CategoryController::class, 'update_category'])->name('category.update');
    Route::get('/category/status/update/{id}', [CategoryController::class, 'update_status'])->name('category.status.change');
    // Route::get('/backend/media', 'App\Http\Controllers\backend\MediaController@index')->name('backend.media')->middleware('isAuth');
    //media
    Route::get('/media/ajex', [MediaController::class, 'index_ajex'])->name('backend.media.ajex');
    Route::get('/media/library', [MediaController::class, 'library'])->name('backend.media.lirary');
    Route::get('/media/library/add', [MediaController::class, 'library_add'])->name('backend.media.add_new');
    Route::post('/media/library/create', [MediaController::class, 'library_image_action'])->name('backend.media.create');
    Route::get('/media/library/image/delete', [MediaController::class, 'library_image_delete'])->name('backend.media.delete');
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

