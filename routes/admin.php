<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProductController;

Route::controller(AdminController::class)->group(function () {
    Route::get('/index', 'index')->name('admin.index');
    Route::get('/login', 'loginCreate')->name('admin.login');
    Route::post('/login', 'authenticate')->name('admin.authenticate');
    Route::get('/create', 'registerCreate')->name('admin.create');
    Route::post('/create', 'store')->name('admin.store');
});

Route::get('/products', [ProductController::class, 'productsIndex'])->name('admin.products.index');
Route::get('/products/create', [ProductController::class, 'productsCreate'])->name('admin.products.create');
Route::post('/products/create', [ProductController::class, 'productsStore'])->name('admin.products.post');
Route::get('/products/{product}', [ProductController::class, 'productView'])->name('admin.products.view');
Route::post('/products/{product}', [ProductController::class, 'productsEdit'])->name('admin.products.put');
Route::get('/products/delete/{product}', [ProductController::class, 'productsDelete'])->name('admin.products.delete');
