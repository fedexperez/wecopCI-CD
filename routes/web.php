<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

//Home
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::post('/home/emisionCalculator/', 'App\Http\Controllers\HomeController@calculateEmision')->name('home.emisionCalculator');

//Order routes
Route::get('/order/show/{id}', 'App\Http\Controllers\OrderController@show')->name('order.show');
Route::get('/order/list', 'App\Http\Controllers\OrderController@list')->name('order.list');
Route::get('/order/return/{id}', 'App\Http\Controllers\OrderController@return')->name('order.return');
Route::get('/order/add/{id}', 'App\Http\Controllers\OrderController@add')->name('order.add');
Route::get('/order/removeAll', 'App\Http\Controllers\OrderController@removeAll')->name('order.removeAll');
Route::get('/order', 'App\Http\Controllers\OrderController@showTempOrder')->name('order.order');
Route::get('/order/buy', 'App\Http\Controllers\OrderController@buy')->name('order.buy');
Route::get('/order/document/{type}/{id}/', 'App\Http\Controllers\OrderController@createDocument')->name('order.createDocument');

//Review routes
Route::get('/review/show/{id}', 'App\Http\Controllers\ReviewController@show')->name('review.show');
Route::get('/review/create/{id}', 'App\Http\Controllers\ReviewController@create')->name('review.create');
Route::post('/review/save/{id}', 'App\Http\Controllers\ReviewController@save')->name('review.save');

//EcoProduct routes
Route::get('/ecoProduct/show/{id}/review/{filter}', 'App\Http\Controllers\EcoProductController@show')->name('ecoProduct.show');
Route::get('/ecoProduct/list/{filter}', 'App\Http\Controllers\EcoProductController@list')->name('ecoProduct.list');
Route::get('/ecoProduct/show/{id}/NotFound', 'App\Http\Controllers\EcoProductController@notFound')->name('ecoProduct.notFound');

//Address routes
Route::get('/address/options', 'App\Http\Controllers\AddressController@options')->name('address.options');
Route::get('/address/create', 'App\Http\Controllers\AddressController@create')->name('address.create');
Route::post('/address/save', 'App\Http\Controllers\AddressController@save')->name('address.save');
Route::get('/address/delete/{id}', 'App\Http\Controllers\AddressController@delete')->name('address.delete');
Route::get('/address/list', 'App\Http\Controllers\AddressController@list')->name('address.list');
Route::get('/address/show/{id}', 'App\Http\Controllers\AddressController@show')->name('address.show');

//SearchBar routes
Route::get('/searchBar/results', 'App\Http\Controllers\SearchBarController@search')->name('searchBar.results');

//Admin index
Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');

//AdminEcoProduct routes
Route::get('/admin/ecoProduct/show/{id}', 'App\Http\Controllers\Admin\EcoProductAdminController@show')->name('admin.ecoProduct.show');
Route::get('/admin/ecoProduct/list', 'App\Http\Controllers\Admin\EcoProductAdminController@list')->name('admin.ecoProduct.list');
Route::get('/admin/ecoProduct/show/{id}/NotFound', 'App\Http\Controllers\Admin\EcoProductAdminController@notFound')->name('admin.ecoProduct.notFound');
Route::get('/admin/ecoProduct/create', 'App\Http\Controllers\Admin\EcoProductAdminController@create')->name('admin.ecoProduct.create');
Route::get('/admin/ecoProduct/delete/{id}', 'App\Http\Controllers\Admin\EcoProductAdminController@delete')->name('admin.ecoProduct.delete');
Route::post('/admin/ecoProduct/save', 'App\Http\Controllers\Admin\EcoProductAdminController@save')->name('admin.ecoProduct.save');

//AdminNotEcoProduct routes
Route::get('/admin/notEcoProduct/show/{id}', 'App\Http\Controllers\Admin\NotEcoProductAdminController@show')->name('admin.notEcoProduct.show');
Route::get('/admin/notEcoProduct/list', 'App\Http\Controllers\Admin\NotEcoProductAdminController@list')->name('admin.notEcoProduct.list');
Route::get('/admin/notEcoProduct/show/{id}/NotFound', 'App\Http\Controllers\Admin\NotEcoProductAdminController@notFound')->name('admin.notEcoProduct.notFound');
Route::get('/admin/notEcoProduct/create', 'App\Http\Controllers\Admin\NotEcoProductAdminController@create')->name('admin.notEcoProduct.create');
Route::get('/admin/notEcoProduct/delete/{id}', 'App\Http\Controllers\Admin\NotEcoProductAdminController@delete')->name('admin.notEcoProduct.delete');
Route::post('/admin/notEcoProduct/save', 'App\Http\Controllers\Admin\NotEcoProductAdminController@save')->name('admin.notEcoProduct.save');

//AdminReview routes
Route::get('/admin/review/list/ecoProduct/{id}', 'App\Http\Controllers\Admin\ReviewAdminController@list')->name('admin.review.list');
Route::get('/admin/review/show/{id}', 'App\Http\Controllers\Admin\ReviewAdminController@show')->name('admin.review.show');
Route::get('/admin/review/delete/{id}', 'App\Http\Controllers\Admin\ReviewAdminController@delete')->name('admin.review.delete');

//Auth routes
Auth::routes();

//Language
Route::get('lang/{lang}', 'App\Http\Controllers\LanguageController@swap')->name('lang.swap');

//API
Route::get('/ecoProductsJson', 'App\Http\Controllers\Api\EcoProductAPIController@index')->name('json.ecoProducts');

//Team Api
Route::get('/teamApi', 'App\Http\Controllers\TeamApiController@show')->name('teamApi.show');
