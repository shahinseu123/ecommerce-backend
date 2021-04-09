<?php

use App\Http\Controllers\auth\login\LoginController;
use App\Http\Controllers\auth\login\RegisterController;
use App\Http\Controllers\backend\attribute\AttributeController;
use App\Http\Controllers\backend\brand\BrandController;
use App\Http\Controllers\backend\category\CategoryController;
use App\Http\Controllers\backend\customer\CustomerController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\general_settings\GeneralsettingController;
use App\Http\Controllers\backend\media\MediaController;
use App\Http\Controllers\backend\menu\MenuController;
use App\Http\Controllers\backend\pages\PageController;
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
    // brand
    Route::get('/brand', [BrandController::class, 'index'])->name('backend.brand');
    Route::get('/brand/add', [BrandController::class, 'add_brand'])->name('backend.brand.add');
    Route::post('/brand/create', [BrandController::class, 'create_brand'])->name('backend.brand.create');
    Route::get('/brand/delete/{id}', [BrandController::class, 'delete_brand'])->name('brand.delete');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit_brand'])->name('brand.edit');
    Route::post('/brand/update', [BrandController::class, 'update_brand'])->name('brand.update');
    Route::get('/brand/status/change/{id}', [BrandController::class, 'change_status'])->name('brand.status.change');
    //customers
    Route::get('/customer', [CustomerController::class, 'index'])->name('backend.customer');
    Route::get('/customer/status/change/{id}', [CustomerController::class, 'change_status'])->name('customer.status.change');
    Route::get('/customer/add', [CustomerController::class, 'add_customer'])->name('backend.customer.add');
    Route::get('/customer/edit/{id}', [CustomerController::class, 'edit_customer'])->name('customer.edit');
    Route::get('/customer/delete/{id}', [CustomerController::class, 'delete_customer'])->name('customer.delete');
    Route::post('/customer/create', [CustomerController::class, 'create_customer'])->name('customer.create');
    Route::post('/customer/update', [CustomerController::class, 'update_customer'])->name('customer.update');
    //general settings
    Route::get('/general-setting', [GeneralsettingController::class, 'index'])->name('backend.genetal-settings');
    //page
    Route::get('/page', [PageController::class, 'index'])->name('backend.page');
    Route::get('/page/status/change/{id}', [PageController::class, 'change_status'])->name('page.status.change');
    Route::get('/page/add-page', [PageController::class, 'add_page'])->name('backend.page.add');
    Route::get('/page/edit/{id}', [PageController::class, 'edit_page'])->name('page.edit');
    Route::get('/page/delete/{id}', [PageController::class, 'delete_page'])->name('page.delete');
    Route::post('/page/create', [PageController::class, 'create_page'])->name('backend.page.create');
    Route::post('/page/update', [PageController::class, 'update_page'])->name('backend.page.update');
    //attribute
    Route::get('/attribute', [AttributeController::class, 'index'])->name('backend.attribute');
    Route::post('/attribute/add', [AttributeController::class, 'add_attribute'])->name('backend.attribute.add');
    Route::get('/attribute/edit', [AttributeController::class, 'edit_attribute'])->name('attribute.edit');
    Route::post('/attribute/update', [AttributeController::class, 'update_attribute'])->name('attribute.update');
    Route::get('/attribute/delete/{id}', [AttributeController::class, 'delete_attribute'])->name('attribute.delete');
    Route::get('/attribute/item/edit', [AttributeController::class, 'edit_attribute_item'])->name('attribute.item.edit');
    Route::get('/attribute/item/delete', [AttributeController::class, 'delete_attribute_item'])->name('attribute.item.delete');
    Route::post('/attribute/item/update', [AttributeController::class, 'update_attribute_item'])->name('attrinute.item.update');
    Route::post('/attribute/add-item', [AttributeController::class, 'add_attribute_item'])->name('backend.attribute.add-item');
    //category
    Route::get('/category', [CategoryController::class, 'index'])->name('backend.category');
    Route::get('/category/add', [CategoryController::class, 'add_category'])->name('backend.category.add');
    Route::post('/category/create', [CategoryController::class, 'create_category'])->name('backend.category.create');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete_category'])->name('category.delete');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit_category'])->name('category.edit');
    Route::post('/category/update', [CategoryController::class, 'update_category'])->name('category.update');
    Route::get('/category/status/update/{id}', [CategoryController::class, 'update_status'])->name('category.status.change');
    // Route::get('/backend/media', 'App\Http\Controllers\backend\MediaController@index')->name('backend.media')->middleware('isAuth');
    // menu 
    Route::get('/menu', [MenuController::class, 'index'])->name('backend.menu');
    Route::post('/menu/create', [MenuController::class, 'create'])->name('backend.menu.create');
    Route::post('/menu/delete', [MenuController::class, 'delete_menu'])->name('backend.menu.delete');
    Route::get('/menu/menu-item/delete', [MenuController::class, 'delete_menu_item'])->name('backend.single-menu-item.delete');
    Route::post('/menu/update-position', [MenuController::class, 'update_position'])->name('backend.menu-item.updatePosition');
    Route::post('/menu/menu-item/add', [MenuController::class, 'add_menu_item'])->name('backend.menu-item.add');
    Route::post('/menu/menu-item/custom-link', [MenuController::class, 'backend_add_link_action'])->name('backend.add.link.action');
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

