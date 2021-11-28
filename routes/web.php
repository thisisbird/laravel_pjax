<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use App\Http\Controllers\OAuthController;



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
Route::any('login', 'App\Http\Controllers\Frontend\UserController@login')->name('frontend.user.login');
Route::get('registration', 'App\Http\Controllers\Frontend\UserController@registration')->name('frontend.user.registration');
Route::post('registration', 'App\Http\Controllers\Frontend\UserController@postRegistration');
Route::get('signOut', 'App\Http\Controllers\Frontend\UserController@signOut')->name('frontend.user.signOut');


Route::get('/google/auth', [OAuthController::class, 'google']);
Route::get('/google/auth/callback', [OAuthController::class, 'googleCallback']);

Route::get('/fb/auth', [OAuthController::class, 'fb']);
Route::get('/fb/auth/callback', [OAuthController::class, 'fbCallback']);

Route::get('/', function () {
    return view('welcome')->name('frontend.user.info');
});


Route::get('/pjax', function () {
    return view('pjax');
});
Route::get('/pjax2', function () {
    return view('pjax2');
});
Route::get('/pjax3', function () {
    return view('pjax3');
});
Route::get('/pjax4', function () {
    return view('pjax4');
});

Route::get('/index/ajaxcontent','App\Http\Controllers\IndexController@ajaxContent');// 載入頁面

Route::get('/product_list/{id?}', 'App\Http\Controllers\Frontend\ProductListController@index');
Route::get('/cart/{cookies_id?}', 'App\Http\Controllers\Frontend\UserCartController@index')->name('frontend.userCart.index');
Route::post('/add_cart', 'App\Http\Controllers\Frontend\UserCartController@addCart')->name('frontend.userCart.addCart');
Route::delete('/add_cart', 'App\Http\Controllers\Frontend\UserCartController@deleteCart')->name('frontend.userCart.deleteCart');

Route::post('/create_order', 'App\Http\Controllers\Frontend\UserCartController@createOrder')->name('frontend.userCart.createOrder');

Route::group(['middleware'=> 'auth:web'], function (Router $router) {
    // $router->resource('user', 'App\Http\Controllers\Frontend\UserController');
    $router->get('/product/{id?}', 'App\Http\Controllers\Frontend\ProductController@index');
    $router->get('/user', 'App\Http\Controllers\Frontend\UserController@index');
});
