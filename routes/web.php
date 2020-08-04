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

Route::get('/', [
    'uses' => 'BookController@list',
    'as' => 'book.list',
]);

Route::get('/sortedatoz', [
    'uses' => 'BookController@listByTitleAZ',
    'as' => 'book.listByTitleAZ'
]);

Route::get('/sortedztoa', [
    'uses' => 'BookController@listByTitleZA',
    'as' => 'book.listByTitleZA'
]);

Route::get('/computingbooks', [
    'uses' => 'BookController@listByComputingCategory',
    'as' => 'book.listByComputingCategory'
]);

Route::get('/businessbooks', [
    'uses' => 'BookController@listByBusinessCategory',
    'as' => 'book.listByBusinessCategory'
]);

Route::get('/languagebooks', [
    'uses' => 'BookController@listByLanguageCategory',
    'as' => 'book.listByLanguageCategory'
]);

Route::get('/signup', [
    'uses' => 'UserController@getSignup',
    'as' => 'user.signup',
    'middleware' => 'guest'
]);

Route::post('/signup', [
    'uses' => 'UserController@postSignup',
    'as' => 'user.signup',
    'middleware' => 'guest'
]);

Route::get('/signin', [
    'uses' => 'UserController@getSignin',
    'as' => 'user.signin',
    'middleware' => 'guest'
]);

Route::post('/signin', [
    'uses' => 'UserController@postSignin',
    'as' => 'user.signin',
    'middleware' => 'guest'
]);

Route::get('/logout', [
    'uses' => 'UserController@getLogout',
    'as' => 'user.logout',
    'middleware' => 'auth'
]);

Route::get('/moreinfo/{id}', 'BookController@getMoreInfo');

Route::get('/addStock/{id}', 'BookController@addStock');

Route::get('/shoppingcart', [
    'uses' => 'BookController@getCart',
    'as' => 'book.shoppingcart',
    'middleware' => 'auth'
]);

Route::get('/add-to-cart/{id}', [
    'uses' => 'BookController@getAddToCart',
    'as' => 'book.addToCart'
]);

Route::get('/checkout', [
    'uses' => 'BookController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::post('/checkout', [
    'uses' => 'BookController@checkout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::get('/orders', [
    'uses' => 'OrderController@getOrders',
    'as' => 'orders',
    'middleware' => 'auth'
]);

Route::get('/removeall/{id}', [
    'uses' => 'BookController@removeAll',
    'as' => 'book.removeAll'
]);

Route::get('/addbook', [
    'uses' => 'BookController@getAddABook',
    'as' => 'book.addBook',
    'middleware' => 'auth'
]);

Route::post('/addbook', [
    'uses' => 'BookController@postAddABook',
    'as' => 'book.addBook',
    'middleware' => 'auth'
]);