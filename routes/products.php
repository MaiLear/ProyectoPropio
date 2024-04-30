<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/products/delete/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/shop/cart', [ProductController::class, 'cart'])->name('customer.cart');
Route::get('/{quantity}/products', [ProductController::class, 'getOldProducts'])->name('customer.oldproducts');
Route::get('/{quantity}/newproducts', [ProductController::class, 'getNewProducts'])->name('customer.newproducts');


Route::get('/products/status/{product}', [ProductController::class, 'inactive'])->name('products.inactive');

Route::get('/filterproducts', [ProductController::class, 'getFilterProducts'])->name('products.filter');

Route::get('/products/active/{product}', [ProductController::class, 'active'])->name('products.active');

Route::resource('products', ProductController::class)->except([
    'destroy',
    'index'
]);
