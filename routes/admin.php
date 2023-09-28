<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;


Route::controller(AdminController::class)->group(function(){
    Route::get('/index','index')->name('admin.index');
    Route::get('/login','login')->name('admin.login');
    Route::post('/login','authenticate')->name('admin.authenticate');
    Route::get('/create', 'create')->name('admin.create');
    Route::post('/create', 'store')->name('admin.store');
});

