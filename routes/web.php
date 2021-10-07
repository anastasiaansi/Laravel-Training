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
//lesson 1 Begin
//приветствиe
Route::get('/hello/{user}', function ($user) {
    return 'Hello World, ' . $user;
});
//информация
Route::get('/about', function () {
    return 'here is project description';
});
//вывод нескольких новостей
Route::get('/news', function () {
    return 'here is our news section';
});
//вывод одной новости
Route::get('/news/{id}', function ($id) {
    return 'here is detail about News ' . $id;
});
//lesson 1 End