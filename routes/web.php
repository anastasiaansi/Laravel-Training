<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\Admin\IndexController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\Admin\FeedbackController;
use \App\Http\Controllers\Admin\OrderController;
use \App\Http\Controllers\Admin\CategoryController;
use \App\Http\Controllers\Admin\UserController;
use \App\Http\Controllers\Account\IndexController as AccountController;

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
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', AccountController::class)->name('account');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], (function () {
        Route::get('/', AdminController::class)->name('index');
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/categories', CategoryController::class);
        Route::resource('/user', UserController::class);

        Route::resource('/feedback', FeedbackController::class);
        Route::resource('/order', OrderController::class);
    }));
});
Route::prefix('/news')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/{id}', [NewsController::class, 'show'])->name('show');
});
Route::get('/category/{id}', [NewsController::class, 'category'])->name('category');

//Route::get('collection', function () {
//    $names = ['Ann', 'Bet', 'Luck', 'Ben', 'Bob', 'Ia', 'Yan'];
//    $collection = collect($names);
//    dd($collection);
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
