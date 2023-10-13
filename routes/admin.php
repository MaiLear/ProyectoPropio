<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\CustomerController;

Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'authenticate'])->name('admin.authenticate');

Route::get('/admin/logout',[AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/admin/customer', [CustomerController::class, 'index'])->name('customer.index');

Route::get('/admin/customer/{customer}', [CustomerController::class, 'destroy'])->name('customer.destroy');

Route::get('/admin/forgot-password', [CustomerController::class, 'forgotPassword'])->name('admin.forgotpassword');

Route::post('/admin/forgot-password', [CustomerController::class, 'forgotPasswordPost'])->name('admin.forgotpasswordPost');

Route::get('/admin/reset-password/{token}', [CustomerController::class, 'resetPassword'])->name('admin.resetpassword');

Route::post('/admin/reset-password', [CustomerController::class, 'resetPasswordPost'])->name('admin.resetpasswordpost');

Route::resource('admin', AdminController::class);



