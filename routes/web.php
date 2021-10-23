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
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

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

    Route::get('/returns-and-complaints', function() {
        return view('pages.returns_and_complaint');
    })->name("returns-and-complaints");
});

Route::prefix('account')->name('account.')->middleware(['auth','verified'])->group(function () {

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

require __DIR__.'/auth.php';
