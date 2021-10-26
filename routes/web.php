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

Route::get('/categories', function () {
    return view('pages.categories');
})->name("categories");

Route::prefix('page')->group(function () {

    Route::get('/faq', function () {
        return view('pages.faq');
    })->name("faq");

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

Route::get('/cart', function() {
    return view('pages.cart');
})->name("cart");

Route::get('/cart-empty', function() {
    return view('pages.cart_empty');
})->name("cart-empty");

Route::get('/place-order-not-loggedin', function() {
    return view('pages.place_order_not_loggedin');
})->name("place-order-not-loggedin");

Route::get('/place-order-form-not-loggedin', function() {
    return view('pages.place_order_form_not_loggedin');
})->name("place-order-form-not-loggedin");

Route::get('/place-order-loggedin', function() {
    return view('pages.place_order_loggedin');
})->name("place-order-loggedin");

Route::get('/order-shelter-not-loggedin', function() {
    return view('pages.shelter_order_not_loggedin');
})->name("order-shelter-not-loggedin");

Route::get('/order-shelter-not-loggedin', function() {
    return view('pages.shelter_order_not_loggedin');
})->name("order-shelter-not-loggedin");

Route::get('/order-shelter-loggedin', function() {
    return view('pages.shelter_order_loggedin');
})->name("order-shelter-loggedin");

Route::get('/product', function() {
    return view('pages.product');
})->name("product");

Route::get('/product-frozen', function() {
    return view('pages.product_frozen');
})->name("product");

require __DIR__.'/auth.php';
