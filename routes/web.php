<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/add-product', [ProductController::class, 'create'])->name('products.create');
Route::get('/update-product/{id}', [ProductController::class, 'update'])->name('products.update');
Route::post('/save', [ProductController::class, 'save'])->name('products.save');
Route::put('/updated/{id}', [ProductController::class, 'updSave'])->name('products.updSave');
Route::get('/delete-product/{id}', [ProductController::class, 'delete'])->name('products.delete');
