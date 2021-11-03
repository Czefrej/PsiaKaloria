<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Route::get('', function () {
    return view('index');
})->name("home");

Route::prefix('page')->group(function () {

    Route::get('/faq', function () {
        return view('pages.faq');
    })->name("faq");

    Route::get('/returns-and-complaints', function() {
        return view('pages.returns_and_complaint');
    })->name("returns-and-complaints");

    Route::get('/regulations', function() {
        return view('pages.regulations');
    })->name("regulations");
});

Route::prefix('account')->middleware(['verified'])->name('account.')->group(function () {
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
    return view('pages.cart-new');
})->name("cart");

Route::get('/order', [OrderController::class, 'index'])->name("order");

Route::get('/cart-empty', function() {
    return view('pages.cart_empty');
})->name("cart-empty");

Route::get('/place-order-not-loggedin', function() {
    return view('pages.place_order_not_loggedin');
})->name("place-order-not-loggedin");

Route::get('/place-order-form-not-loggedin', function() {
    return view('pages.place_order_form_not_loggedin');
})->name("place-order-form-not-loggedin");

Route::get('/subscription-not-loggedin', function() {
    return view('pages.subscription_not_loggedin');
})->name("subscription-not-loggedin");

Route::get('/subscription-shelter-not-loggedin', function() {
    return view('pages.subscription_sheltor_not_loggedin');
})->name("subscription-sheltor-not-loggedin");

Route::get('/subscription-loggedin', function() {
    return view('pages.subscription_loggedin');
})->name("subscription-loggedin");

Route::get('/subscription-shelters-loggedin', function() {
    return view('pages.subscription_shelters_loggedin');
})->name("subscription-shelters-loggedin");

Route::get('/place-order-loggedin', function() {
    return view('pages.place_order_loggedin');
})->name("place-order-loggedin");

Route::get('/place-order-form-loggedin', function() {
    return view('pages.place_order_form_loggedin');
})->name("place-order-form-loggedin");

Route::get('/order-shelter-not-loggedin', function() {
    return view('pages.shelter_order_not_loggedin');
})->name("order-shelter-not-loggedin");

Route::get('/order-shelter-not-loggedin', function() {
    return view('pages.shelter_order_not_loggedin');
})->name("order-shelter-not-loggedin");

Route::get('/order-shelter-form-not-loggedin', function() {
    return view('pages.shelter_order_form_not_loggedin');
})->name("order-shelter-form-not-loggedin");

Route::get('/order-shelter-form-loggedin', function() {
    return view('pages.shelter_order_form_loggedin');
})->name("order-shelter-form-loggedin");

Route::get('/order-shelter-loggedin', function() {
    return view('pages.shelter_order_loggedin');
})->name("order-shelter-loggedin");

Route::get('/product', function() {
    return view('pages.product');
})->name("product");


Route::get('/product-frozen', function() {
    return view('pages.product_frozen');
})->name("product");

Route::get('/products',[ProductController::class,'index'])->name('products');

Route::get('/product/{product:slug}', [ProductController::class, 'show'])
    ->name('product')
    ->missing(function (Request $request) {
        return Redirect::route('products');
    });

Route::resource('cart', CartController::class, [
    'names' => [
        'index' => 'cart',
        'store' => 'cart.store',
    ]
]);

require __DIR__.'/auth.php';
