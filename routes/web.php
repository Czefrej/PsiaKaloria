<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShelterController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserController;
use App\Models\Order;
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
//Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
//
Route::get('', function () {
    if(!\Illuminate\Support\Facades\Auth::check())
        return redirect('/login');
    else
        return redirect('/account/settings');
})->name("home");

//Route::prefix('page')->group(function () {
//
//    Route::get('/faq', function () {
//        return view('pages.faq');
//    })->name("faq");
//
//    Route::get('/returns-and-complaints', function() {
//        return view('pages.returns_and_complaint');
//    })->name("returns-and-complaints");
//
//    Route::get('/regulations', function() {
//        return view('pages.regulations');
//    })->name("regulations");
//});
//

//Route::get('/email', function() {
//        return view('mail.test');
//})->name("regulations");
Route::prefix('webhook')->group(function(){
    Route::get('/mail', [\App\Http\Controllers\OrderMailController::class, 'process']);

    Route::get('/print', [\App\Http\Controllers\PrintLabelController::class, 'index']);
});

Route::prefix('account')->middleware(['verified'])->name('account.')->group(function () {
    Route::resource('shelter', ShelterController::class)->middleware("isadmin");
    Route::resource('user', UserController::class)->middleware("isadmin");

    Route::get('/settings', function() {
        return view('account.settings');
    })->name("settings");

    Route::get('/create-user', function() {
        return view('account.create_account');
    })->name("create-user")->middleware("isadmin");

//    Route::get('/create-shelter', function() {
//        return view('account.create_shelter');
//    })->name("create-shelter")->middleware("isadmin");
//
//    Route::get('/shelters', [ShelterController::class, 'index'])->name("shelters")->middleware("isadmin");;

//    Route::get('/shelters', function() {
//        return view('account.shelters');
//    })->name("shelters")->middleware("isadmin");

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

//Route::get('/register', function() {
//    return view('auth.register');
//})->name('register');

Route::get('/forgot-password', function() {
    return view('auth.forgot_password');
})->name('forgot-password');

//Route::get('/registration-success', function() {
//    return view('auth.registration_success');
//})->name('registration-success');

Route::get('/auth/error-state', function() {
    return view('auth.error_state');
})->name('error-state');

//Route::get('/cart', function() {
//    return view('pages.cart-new');
//})->name("cart");
//
//Route::get('/order', [OrderController::class, 'index'])->name("order");
//
//Route::get('/cart-empty', function() {
//    return view('pages.cart_empty');
//})->name("cart-empty");
//
//Route::get('/place-order-not-loggedin', function() {
//    return view('pages.place_order_not_loggedin');
//})->name("place-order-not-loggedin");
//
//Route::get('/place-order-form-not-loggedin', function() {
//    return view('pages.place_order_form_not_loggedin');
//})->name("place-order-form-not-loggedin");
//
//Route::get('/subscription-not-loggedin', function() {
//    return view('pages.subscription_not_loggedin');
//})->name("subscription-not-loggedin");
//
//Route::get('/subscription-shelter-not-loggedin', function() {
//    return view('pages.subscription_sheltor_not_loggedin');
//})->name("subscription-sheltor-not-loggedin");
//
//Route::get('/subscription-loggedin', function() {
//    return view('pages.subscription_loggedin');
//})->name("subscription-loggedin");
//
//Route::get('/subscription-shelters-loggedin', function() {
//    return view('pages.subscription_shelters_loggedin');
//})->name("subscription-shelters-loggedin");
//
//Route::get('/place-order-loggedin', function() {
//    return view('pages.place_order_loggedin');
//})->name("place-order-loggedin");
//
//Route::get('/place-order-form-loggedin', function() {
//    return view('pages.place_order_form_loggedin');
//})->name("place-order-form-loggedin");
//
//Route::get('/order-shelter-not-loggedin', function() {
//    return view('pages.shelter_order_not_loggedin');
//})->name("order-shelter-not-loggedin");
//
//Route::get('/order-shelter-not-loggedin', function() {
//    return view('pages.shelter_order_not_loggedin');
//})->name("order-shelter-not-loggedin");
//
//Route::get('/order-shelter-form-not-loggedin', function() {
//    return view('pages.shelter_order_form_not_loggedin');
//})->name("order-shelter-form-not-loggedin");
//
//Route::get('/order-shelter-form-loggedin', function() {
//    return view('pages.shelter_order_form_loggedin');
//})->name("order-shelter-form-loggedin");
//
//Route::get('/order-shelter-loggedin', function() {
//    return view('pages.shelter_order_loggedin');
//})->name("success");
//
//Route::get('/product', function() {
//    return view('pages.product');
//})->name("product");
//
//
//Route::get('/product-frozen', function() {
//    return view('pages.product_frozen');
//})->name("product");
//
//Route::get('/products',[ProductController::class,'index'])->name('products');
//
//Route::get('/product/{product:slug}', [ProductController::class, 'show'])
//    ->name('product')
//    ->missing(function (Request $request) {
//        return Redirect::route('products');
//    });
//
//Route::resource('cart', CartController::class, [
//    'names' => [
//        'index' => 'cart',
//        'store' => 'cart.store',
//    ]
//]);
//
//Route::post('/create', [StripeController::class, 'index'])->name("create");
//Route::get('/create', [StripeController::class, 'index']);
//
//Route::get('/fulfill-order', [OrderController::class, 'create'])->name("fulfill-order");
//
////
////Route::post('/create', function() {
////    return view('pages.stripe');
////})->name("productasa");
////
////Route::get('/create', function() {
////    return view('pages.stripe');
////})->name("productasaa");
//
//
//Route::post('/hooks', [\App\Http\Controllers\StripeHookController::class,'handle'])->name("hooks");
//
//Route::get('/debug-sentry', function () {
//    $order = Order::find(15054693);
//    $order->status = "unpaid";
//    $order->save();
//});

require __DIR__.'/auth.php';
