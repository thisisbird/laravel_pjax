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

Route::get('/google/auth', [OAuthController::class, 'google']);
Route::get('/google/auth/callback', [OAuthController::class, 'googleCallback']);

Route::get('/fb/auth', [OAuthController::class, 'fb']);
Route::get('/fb/auth/callback', [OAuthController::class, 'fbCallback']);

Route::get('/', function () {
    return view('welcome');
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

Route::group(['middleware'=> 'auth:web'], function (Router $router) {
    // $router->resource('user', 'App\Http\Controllers\Frontend\UserController');
});
