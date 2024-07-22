<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
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
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('dashboard');
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);



// Route Client
Route::get('/',[HomeController::class,'home'])->name('client.home');
Route::get('/product',[ClientProductController::class,'product'])->name('client.product');
Route::get('/product/{id}',[ClientProductController::class,'filterByCate'])->name('client.filterByCate');
Route::get('/product/detail/{id}',[ClientProductController::class,'detailProduct'])->name('client.detail-product');
Route::get('/login',[AccountController::class,'login'])->name('client.login');
Route::post('/login',[AccountController::class,'confirmLogin'])->name('client.confirmLogin');
Route::get('/register',[AccountController::class,'register'])->name('client.register');
Route::post('/register',[AccountController::class,'confirmRegister'])->name('client.confirmRegister');