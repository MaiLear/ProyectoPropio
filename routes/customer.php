<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
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

Route::post('/lostpassword', [CustomerController::class, 'lostPassword'])->name('customer.lostpassword');

Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/create', [CustomerController::class, 'store'])->name('customer.store');
