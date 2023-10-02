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

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'productsCreate')->name('admin.products');
    Route::post('/products', 'productsStore')->name('admin.products')->name('admin.products.post');
    Route::put('/products/{$product}', 'productsEdit')->name('admin.products')->name('admin.products.put');
    Route::delete('/products/{$product}', 'productsDelete')->name('admin.products')->name('admin.products.delete');
});
