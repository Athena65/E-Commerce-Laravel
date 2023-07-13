<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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
Route::resource('admin',AdminController::class);
Route::resource('category',CategoryController::class);

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::get('/product/{id}', 'HomeController@show')->name('product.show');
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/details', 'HomeController@detail')->name('home.detail');

    Route::post('/increaseItem/{id}', 'CartController@increaseItem')->name('increaseItem');
    Route::post('/decraseItem/{id}', 'CartController@decraseItem')->name('decraseItem');
    Route::post('/cart', 'CartController@index')->name('cart.index');
    Route::get('/buyComponent/{id}', 'CartController@buyComponent')->name('buyComponent');
    Route::post('/checkout/{id}', 'StripeController@checkout')->name('stripe.checkout');

    //Route::get('/products', [ProductController::class, 'index'])->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::post('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});
