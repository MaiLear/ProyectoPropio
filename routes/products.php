<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/products/delete/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/products/status/{product}', [ProductController::class, 'inactive'])->name('products.inactive');

Route::get('/products/active/{product}', [ProductController::class, 'active'])->name('products.active');

Route::resource('products', ProductController::class)->except([
    'destroy'
])->middleware('auth.admin');
