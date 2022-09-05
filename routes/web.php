<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('product');

/*--------------- Admin Route ----------------*/
/* Products page only to admin be able to see */
Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products');

/* Products creation page only to admin be able to see */
Route::get('/admin/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');

/* Products page receiving the request and saving the data in DB  */
Route::post('/admin/products', [AdminProductController::class, 'store'])->name('admin.products.store');

/* Products page to edit information */
Route::get('/admin/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');

/* Products page to save edited info */
Route::put('/admin/products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
