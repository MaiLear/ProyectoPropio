<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Mail\ResetPasswordMailable;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', HomeController::class)->name('home');
Route::get('/shop', [CustomerController::class, 'shop'])->name('customer.shop');


Route::get('/login', [CustomerController::class, 'login'])->name('customer.login');
Route::post('/login', [CustomerController::class, 'authenticate'])->name('customer.authenticate');



Route::get('/forgot-password', [CustomerController::class, 'forgotPassword'])->name('customer.forgotpassword');

Route::post('/forgot-password', [CustomerController::class, 'forgotPasswordPost'])->name('customer.forgotpasswordPost');

Route::get('/reset-password/{token}', [CustomerController::class, 'resetPassword'])->name('customer.resetpassword');

Route::post('/reset-password', [CustomerController::class, 'resetPasswordPost'])->name('customer.resetpasswordpost');

Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');

Route::post('/create', [CustomerController::class, 'store'])->name('customer.store');
