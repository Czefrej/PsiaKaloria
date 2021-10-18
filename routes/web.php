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

Route::prefix('page')->group(function () {
    Route::get('/categories', function () {
        return view('pages.categories');
    })->name("categories");

    Route::get('/faq', function () {
        return view('pages.faq');
    })->name("faq");

    Route::get('/contact', function () {
        return view('pages.contact');
    })->name("contact");

    Route::get('/returns-and-complaints', function() {
        return view('pages.returns_and_complaint');
    })->name("returns-and-complaints");
});

Route::prefix('account')->name('account.')->group(function () {

    Route::get('/settings', function() {
        return view('account.settings');
    })->name("settings");

    Route::get('/purchase-history', function() {
        return view('account.purchase_history');
    })->name("purchase-history");

    Route::get('/subscriptions', function() {
        return view('account.subscriptions');
    })->name("subscriptions");

    Route::get('/password', function() {
        return view('account.password');
    })->name('password');

    Route::get('/edit', function() {
        return view('account.edit');
    })->name('edit');

});

Route::get('/login', function() {
    return view('auth.login');
})->name('login');

Route::get('/register', function() {
    return view('auth.register');
})->name('register');

Route::get('/forgot-password', function() {
    return view('auth.forgot_password');
})->name('forgot-password');

Route::get('/registration-success', function() {
    return view('auth.registration_success');
})->name('registration-success');

Route::get('/auth/error-state', function() {
    return view('auth.error_state');
})->name('error-state');
