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
})->name("home");

Route::get('/page/categories', function () {
    return view('pages.categories');
})->name("categories");

Route::get('/page/faq', function () {
    return view('pages.faq');
})->name("faq");

Route::get('/page/returns-and-complaints', function() {
    return view('pages.returns_and_complaint');
})->name("returns-and-complaints");

Route::get('/account/settings', function() {
    return view('account.settings');
})->name("account.settings");

Route::get('/account/purchase-history', function() {
    return view('account.purchase_history');
})->name("account.purchase-history");

Route::get('/account/subscriptions', function() {
    return view('account.subscriptions');
})->name("account.subscriptions");
