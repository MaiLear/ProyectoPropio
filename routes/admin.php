<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;

Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'authenticate'])->name('admin.login.authenticate');

Route::get('/admin/logout',[AdminAuthController::class, 'logout'])->name('admin.logout');

Route::resource('admin', AdminController::class);


Route::get('/products/view/customer', [CustomerController::class, 'indexCustomer'])->name('admin.customer.index');
// Route::get('/products/view/delete/{customer}', [CustomerController::class, 'customersDelete'])->name('admin.customers.delete');

