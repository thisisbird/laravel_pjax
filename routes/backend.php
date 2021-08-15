<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

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
    return view('welcome');
});
Route::get('login', 'App\Http\Controllers\Backend\UserController@index')->name('backend.user.login');
Route::post('login', 'App\Http\Controllers\Backend\UserController@login')->name('backend.user.login');
Route::get('registration', 'App\Http\Controllers\Backend\UserController@registration')->name('backend.user.registration');
Route::post('registration', 'App\Http\Controllers\Backend\UserController@postRegistration');
Route::get('signOut', 'App\Http\Controllers\Backend\UserController@signOut')->name('backend.user.signOut');


Route::get('/index/ajaxcontent','App\Http\Controllers\IndexController@ajaxContent');// 載入頁面

Route::group(['middleware'=> 'auth.backend:backend'], function (Router $router) {
    // $router->resource('user', 'App\Http\Controllers\Frontend\UserController');
    $router->get('dashboard', 'App\Http\Controllers\Backend\UserController@dashboard')->name('backend.user.dashboard');
    $router->get('dashboard2', 'App\Http\Controllers\Backend\UserController@dashboard2')->name('backend.user.dashboard2');
});
