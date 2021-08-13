<?php

use App\Http\Controllers\auth\login\LoginController;
use App\Http\Controllers\auth\login\RegisterController;
use App\Http\Controllers\backend\admin\AdminController;
use App\Http\Controllers\backend\attribute\AttributeController;
use App\Http\Controllers\backend\brand\BrandController;
use App\Http\Controllers\backend\category\CategoryController;
use App\Http\Controllers\backend\customer\CustomerController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\general_settings\GeneralsettingController;
use App\Http\Controllers\backend\media\MediaController;
use App\Http\Controllers\backend\menu\MenuController;
use App\Http\Controllers\backend\order\AllordersController;
use App\Http\Controllers\backend\order\CompletedController;
use App\Http\Controllers\backend\order\DeliveredController;
use App\Http\Controllers\backend\order\NewOrderController;
use App\Http\Controllers\backend\order\ProcessaingController;
use App\Http\Controllers\backend\order\ReturnedController;
use App\Http\Controllers\backend\pages\PageController;
use App\Http\Controllers\backend\products\ProductController;
use App\Http\Controllers\backend\slider\SliderController;
use App\Http\Controllers\backend\stock\adjustment\AdjustmentController;
use App\Http\Controllers\backend\stock\alert\AlertController;
use App\Http\Controllers\backend\stock\prealert\PrealertController;
use App\Http\Controllers\backend\stock\stockout\StockoutController;
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
  Route::post('/products/create', [ProductController::class, 'create_product'])->name('product.create');
  Route::post('/products/update', [ProductController::class, 'update_product'])->name('product.update');
  Route::get('/products/delete/{id}', [ProductController::class, 'delete_product'])->name('product.delete');
  Route::get('/products/edit/{id}', [ProductController::class, 'edit_product'])->name('product.edit');
  //gallery
  Route::get('/gallery/product-gallery/delete', [ProductController::class, 'delete_img'])->name('gallery.delete_gallery_item');
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
  Route::get('/attribute/get-single-item', [AttributeController::class, 'get_single_item'])->name('get.single.attr');
  Route::get('/attribute/get-attr-item', [AttributeController::class, 'get_attr_item'])->name('attribute.get-attr-items');

  //slider
  Route::get('/slider', [SliderController::class, 'index'])->name('backend.slider');
  Route::post('/slider/create', [SliderController::class, 'create_slider'])->name('slider.create');
  Route::post('/slider/update', [SliderController::class, 'update_slider'])->name('slider.update');
  Route::get('/slider/edit/{id}', [SliderController::class, 'edit_slider'])->name('slider.edit');
  Route::get('/slider/delete', [SliderController::class, 'delete_slider'])->name('slider.delete');
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
  //general setting
  Route::post('/general-settings', [GeneralsettingController::class, 'g_settings_update'])->name('general-settings.update');
  //media
  Route::get('/media/ajex', [MediaController::class, 'index_ajex'])->name('backend.media.ajex');
  Route::get('/media/library', [MediaController::class, 'library'])->name('backend.media.lirary');
  Route::get('/media/library/add', [MediaController::class, 'library_add'])->name('backend.media.add_new');
  Route::post('/media/library/create', [MediaController::class, 'library_image_action'])->name('backend.media.create');
  Route::get('/media/library/image/delete', [MediaController::class, 'library_image_delete'])->name('backend.media.delete');
  //orders
  //create new
  Route::get('/order/create-new', [NewOrderController::class, 'index'])->name('backend.neworder');
  Route::get('/order/status/make-delivered/{id}', [NewOrderController::class, 'order_delivered_status'])->name('backend.order.delivered');
  Route::get('/order/status/make-returned/{id}', [NewOrderController::class, 'order_returned_status'])->name('backend.order.returned');
  Route::get('/order/status/make-processing/{id}', [NewOrderController::class, 'order_processing_status'])->name('backend.order.processing');
  Route::get('/order/payment/make-due/{id}', [NewOrderController::class, 'payment_due'])->name('backend.order.payment.due');
  Route::get('/order/payment/make-paid/{id}', [NewOrderController::class, 'payment_paid'])->name('backend.order.payment.paid');
  Route::get('/order/payment/make-pending/{id}', [NewOrderController::class, 'payment_pending'])->name('backend.order.payment.pending');
  Route::get('/order/show/{id}', [NewOrderController::class, 'show_order'])->name('backend.order.show');
  Route::get('/order/get-single-product', [NewOrderController::class, 'get_product'])->name('get-single-product');
  //all orders
  Route::get('/order/all-orders', [AllordersController::class, 'index'])->name('backend.all-orders');
  Route::get('/order/download/pdf/{id}', [AllordersController::class, 'download_pdf'])->name('backend.order.download_pdf');
  //processing
  Route::get('/order/processing', [ProcessaingController::class, 'index'])->name('backend.processing');
  //delivered
  Route::get('/order/delivered', [DeliveredController::class, 'index'])->name('backend.delivared');
  //delivered
  Route::get('/order/completed', [CompletedController::class, 'index'])->name('backend.completed');
  //delivered
  Route::get('/order/returned', [ReturnedController::class, 'index'])->name('backend.returned');


  //admins
  Route::get('/admins', [AdminController::class, 'index'])->name('backend.admin');
  Route::get('/admins/add', [AdminController::class, 'add_admins'])->name('backend.admin.add');
  Route::post('/admins/create', [AdminController::class, 'create_admins'])->name('admin.create');
  Route::post('/admins/update', [AdminController::class, 'update_admins'])->name('admin.update');
  Route::get('/admins/delete/{id}', [AdminController::class, 'delete_admins'])->name('admin.delete');
  Route::get('/admins/edit/{id}', [AdminController::class, 'edit_admins'])->name('admin.edit');
  //stock
  //adjustment
  Route::get('/adjustment', [AdjustmentController::class, 'index'])->name('backend.adjustment');
  Route::get('/adjustment/add', [AdjustmentController::class, 'add_adjustment'])->name('backend.adjustment.add');
  Route::post('/adjustment/create', [AdjustmentController::class, 'create_adjustment'])->name('adjustment.create');
  Route::post('/adjustment/delete/{id}', [AdjustmentController::class, 'delete_adjustment'])->name('adjustment.delete');
  //prealert
  Route::get('/prealert', [PrealertController::class, 'index'])->name('backend.prealert');
  //alert
  Route::get('/alert', [AlertController::class, 'index'])->name('backend.alert');
  //atockout
  Route::get('/stockout', [StockoutController::class, 'index'])->name('backend.stockout');
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
