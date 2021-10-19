<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(): string
    {
        $router1 = route('admin.test1');
        $router2 = route('admin.test2');
        return <<<php
        <h1>Login for admin</h1>
        <p>Same Text</p>
        <p style="color:red;">
            <a href="{$router1}">test1</a>
            <a href="{$router2}">test 2</a>
        </p>
        <p><a href="/">Home Page</a></p>
php;

    }

    public function test1(): string
    {
        $routerName = route('admin.index');
        return <<<php
        <h1>Hello Test1</h1>
        <p style="color:red;">
            <a href="{$routerName}">Admin</a>
        </p>
php;

    }

    public function test2(): string
    {
        $routerName = route('admin.index');
        return <<<php
        <h1>Hello Test2</h1>
        <p style="color:red;">
            <a href="{$routerName}">Admin</a>
        </p>
php;

    }
}
