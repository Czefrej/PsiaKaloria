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
    return view('index');
});

Route::get('/page/categories', function () {
    return view('pages.categories');
});

Route::get('/page/faq', function () {
    return view('pages.faq');
});

Route::get('/page/returns-and-complaints', function() {
    return view('pages.returns_and_complaint');
});
