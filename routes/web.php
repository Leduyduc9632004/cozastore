<?php

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
Route::get('/Product',[ClientProductController::class,'product'])->name('client.product');
Route::get('/Product/{id}',[ClientProductController::class,'filterByCate'])->name('client.filterByCate');
Route::get('/Product/detail/{id}',[ClientProductController::class,'detailProduct'])->name('client.detail-product');