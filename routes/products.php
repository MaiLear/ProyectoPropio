<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::resource('products', ProductController::class)->middleware('auth.admin');

// Route::middleware('auth.admin')->group(function(){
//     Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
//     Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
//     Route::post('/products/create', [ProductController::class, 'store'])->name('admin.products.post');
//     Route::get('/products/{product}', [ProductController::class, 'productView'])->name('admin.products.view');
//     Route::post('/products/{product}', [ProductController::class, 'update'])->name('admin.products.put');
//     Route::get('/products/delete/{product}', [ProductController::class, 'destroy'])->name('admin.products.delete');
// });