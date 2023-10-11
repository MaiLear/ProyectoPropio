<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/products/delete/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::resource('products', ProductController::class)->except([
    'destroy'
])->middleware('auth.admin');
