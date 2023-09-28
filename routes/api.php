<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/show', [AdminController::class, 'show'])->name('api.show');
Route::post('/create', [AdminController::class, 'create'])->name('api.create');
Route::put('/update/{admin}', [AdminController::class, 'update'])->name('api.update');
Route::delete('/delete', [AdminController::class, 'delete'])->name('api.delete');
