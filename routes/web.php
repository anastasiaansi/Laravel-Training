<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\Admin\IndexController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\Admin\FeedbackController;
use \App\Http\Controllers\Admin\OrderController;
use \App\Http\Controllers\Admin\CategoryController;
use \App\Http\Controllers\Admin\UserController;
use \App\Http\Controllers\Account\IndexController as AccountController;
use \App\Http\Controllers\Admin\ParserController;
use \App\Http\Controllers\SocialController;
use \App\Http\Controllers\Admin\ResourcesController;

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
        Route::get('/add/news/{id}', [AdminNewsController::class, 'add'])->name('news.add');
        Route::resource('/categories', CategoryController::class);
        Route::resource('/user', UserController::class);

        Route::resource('/feedback', FeedbackController::class);
        Route::resource('/order', OrderController::class);
        Route::get('/parser', ParserController::class)
            ->name('parser');
        Route::resource('/resources', ResourcesController::class);

    }));
});
Route::prefix('/news')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/{id}', [NewsController::class, 'show'])->name('show');
});
Route::get('/category/{id}', [NewsController::class, 'category'])->name('category');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'guest'], function() {
    Route::get('/gh/link', [SocialController::class, 'link'])
        ->name('gh.link');
    Route::get('/gh/callback', [SocialController::class, 'callback'])
        ->name('gh.callback');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
