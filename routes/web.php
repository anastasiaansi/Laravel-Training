<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\Admin\IndexController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\AccountController;
use \App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [HomeController::class, 'index']);
Route::prefix('/test')->name('test.')->group(function () {
    Route::get('/test1', [IndexController::class, 'test1'])->name('test1');
    Route::get('/test2', [IndexController::class, 'test2'])->name('test2');
});
Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', AdminController::class)->name('index');
    Route::get('/news', [AdminNewsController::class, 'index'])->name('news.index');
    Route::get('/categories', [CategoryController::class, 'index'])->name('cat.index');
    Route::get('/create', [AdminNewsController::class, 'create'])->name('news.create');
    Route::post('/store', [AdminNewsController::class, 'store'])->name('news.store');
});
Route::prefix('/news')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/{id}', [NewsController::class, 'show'])->name('show');
});
Route::get('/category/{id}', [NewsController::class, 'category'])->name('category');
Route::prefix('/account')->name('account.')->group(function () {
    Route::get('/feedback', [AccountController::class, 'feedback'])->name('feedback');
    Route::post('/feedback/store', [AccountController::class, 'store'])->name('feedback.store');
    Route::get('/order', [AccountController::class, 'order'])->name('order');
    Route::post('/order/save', [AccountController::class, 'ordersave'])->name('order.save');
});
