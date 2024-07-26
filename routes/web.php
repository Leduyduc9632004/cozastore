<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\BlogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route Admin
Route::get('/login-admin', [AccountController::class, 'loginAdmin'])->name('loginAdmin');
Route::post('/login-admin', [AccountController::class, 'confirmLoginAdmin'])->name('confirmLoginAdmin');
Route::get('/logout-admin', [AccountController::class, 'logoutAdmin'])->name('admin.logout');
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', function () { return view('admin.dashboard');})->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('sizes', SizeController::class);
    Route::resource('colors', ColorController::class);
    Route::resource('users', UserController::class);
});


// Route Client
Route::get('/', [HomeController::class, 'home'])->name('client.home');
Route::get('/product', [ClientProductController::class, 'product'])->name('client.product');
Route::get('/search', [ClientProductController::class, 'searchProducts'])->name('client.search');
Route::get('/product/{id}', [ClientProductController::class, 'filterByCate'])->name('client.filterByCate');
Route::get('/product/detail/{id}', [ClientProductController::class, 'detailProduct'])->name('client.detail-product');
Route::get('/login', [AccountController::class, 'login'])->name('client.login');
Route::post('/login', [AccountController::class, 'confirmLogin'])->name('client.confirmLogin');
Route::get('/register', [AccountController::class, 'register'])->name('client.register');
Route::post('/register', [AccountController::class, 'confirmRegister'])->name('client.confirmRegister');
Route::get('/logout', [AccountController::class, 'logout'])->name('client.logout');
Route::get('/blog',[BlogController::class,'blog'])->name('client.blog');
