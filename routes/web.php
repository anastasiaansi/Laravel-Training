<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/hello/{user}', function ($user) {
    return 'Hello World, ' . $user;
});
Route::get('/news', function () {
    return 'here is our news section';
});
Route::get('/news/{id}', function ($id) {
    return 'here is detail about News ' . $id;
});
