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
*/

// * 到 Permissions.php 新增sidebar連結
Route::get('/', function () {
    return view('welcome');
})->name('backend.index');
Route::any('login', 'App\Http\Controllers\Backend\UserController@login')->name('backend.user.login');
Route::get('registration', 'App\Http\Controllers\Backend\UserController@registration')->name('backend.user.registration');
Route::post('registration', 'App\Http\Controllers\Backend\UserController@postRegistration');
Route::get('signOut', 'App\Http\Controllers\Backend\UserController@signOut')->name('backend.user.signOut');


// Route::get('/index/ajaxcontent','App\Http\Controllers\IndexController@ajaxContent');// 載入頁面

Route::post('upload_image', 'App\Http\Controllers\Backend\Controller@uploadImage')->name('backend.uploadImage');


Route::group(['middleware'=> 'auth.backend:backend'], function (Router $router) {
    // $router->resource('user', 'App\Http\Controllers\Frontend\UserController');
    $router->get('dashboard', 'App\Http\Controllers\Backend\UserController@dashboard')->name('backend.user.dashboard');
    $router->get('dashboard2', 'App\Http\Controllers\Backend\UserController@dashboard2')->name('backend.user.dashboard2');
    $router->get('user', 'App\Http\Controllers\Backend\UserController@index')->name('backend.user.index');
    $router->get('user/{id}/edit', 'App\Http\Controllers\Backend\UserController@edit')->name('backend.user.edit');
    $router->post('user/{id}', 'App\Http\Controllers\Backend\UserController@update')->name('backend.user.update');


    $router->get('role/', 'App\Http\Controllers\Backend\RoleController@index')->name('backend.role.index');
    $router->get('role/{id}', 'App\Http\Controllers\Backend\RoleController@edit')->name('backend.role.edit');
    $router->post('role/', 'App\Http\Controllers\Backend\RoleController@update')->name('backend.role.update');
    $router->delete('role/{id}', 'App\Http\Controllers\Backend\RoleController@delete')->name('backend.role.delete');

    $router->get('article_menu/', 'App\Http\Controllers\Backend\ArticleMenuController@index')->name('backend.articleMenu.index');
    $router->get('article_menu/{id}', 'App\Http\Controllers\Backend\ArticleMenuController@edit')->name('backend.articleMenu.edit');
    $router->post('article_menu/', 'App\Http\Controllers\Backend\ArticleMenuController@update')->name('backend.articleMenu.update');
    $router->delete('article_menu', 'App\Http\Controllers\Backend\ArticleMenuController@delete')->name('backend.articleMenu.delete');

    $router->get('article/', 'App\Http\Controllers\Backend\ArticleController@index')->name('backend.article.index');
    $router->get('article/{id}', 'App\Http\Controllers\Backend\ArticleController@edit')->name('backend.article.edit');
    $router->post('article/', 'App\Http\Controllers\Backend\ArticleController@update')->name('backend.article.update');
    $router->delete('article', 'App\Http\Controllers\Backend\ArticleController@delete')->name('backend.article.delete');
    $router->post('article/delete_photo', 'App\Http\Controllers\Backend\MallItemController@deletePhoto')->name('backend.article.deletePhoto');


    $router->get('item_menu/', 'App\Http\Controllers\Backend\ItemMenuController@index')->name('backend.itemMenu.index');
    $router->get('item_menu/{id}', 'App\Http\Controllers\Backend\ItemMenuController@edit')->name('backend.itemMenu.edit');
    $router->post('item_menu/', 'App\Http\Controllers\Backend\ItemMenuController@update')->name('backend.itemMenu.update');
    $router->delete('item_menu', 'App\Http\Controllers\Backend\ItemMenuController@delete')->name('backend.itemMenu.delete');

    $router->get('mall_item/', 'App\Http\Controllers\Backend\MallItemController@index')->name('backend.mallItem.index');
    $router->get('mall_item/{id}', 'App\Http\Controllers\Backend\MallItemController@edit')->name('backend.mallItem.edit');
    $router->post('mall_item/', 'App\Http\Controllers\Backend\MallItemController@update')->name('backend.mallItem.update');
    $router->post('mall_item/delete_photo', 'App\Http\Controllers\Backend\MallItemController@deletePhoto')->name('backend.mallItem.deletePhoto');
    $router->delete('mall_item', 'App\Http\Controllers\Backend\MallItemController@delete')->name('backend.mallItem.delete');

    $router->get('mall_order/{id?}', 'App\Http\Controllers\Backend\MallOrderController@index')->name('backend.mallOrder.index');
    $router->post('mall_order/{id?}', 'App\Http\Controllers\Backend\MallOrderController@update')->name('backend.mallOrder.update');


    // $router->get('pixi', 'App\Http\Controllers\Backend\PixiController@test')->name('backend.pixi.test');
    // $router->get('pixi2', 'App\Http\Controllers\Backend\PixiController@test2')->name('backend.pixi.test2');
    // $router->get('pixi3', 'App\Http\Controllers\Backend\PixiController@test3')->name('backend.pixi.test3');
    // $router->get('pixi4', function () {return view('backend.pixi.test4');})->name('backend.pixi.test4');

    
    $router->get('stock/kline', function () {return view('backend.stock.kline');})->name('backend.stock.kline');
});

