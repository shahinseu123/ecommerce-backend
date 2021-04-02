<?php

use App\Http\Controllers\auth\login\LoginController;
use App\Http\Controllers\auth\login\RegisterController;
use App\Http\Controllers\backend\DashboardController;
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

Route::get('/', function () {
    return view('backend.layout.master');
});

//auth check route group
// admin panel routes     
Route::middleware(['isAuth'])->prefix('backend/admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('backend.dashboard');
});
//auth check route group
// user panel routes     
Route::middleware(['first', 'second'])->prefix('user')->group(function () {
    
});
//do not check auth
Route::get('/backend/auth/admin/login', [LoginController::class, 'login_page'])->name('admin.login');
Route::post('/backend/auth/admin/login/action', [LoginController::class, 'login_action'])->name('admin.login.action');
Route::get('/backend/auth/admin/register', [RegisterController::class, 'register_page'])->name('admin.register');
Route::post('/backend/auth/admin/register/action', [RegisterController::class, 'register_action'])->name('admin.register.action');

