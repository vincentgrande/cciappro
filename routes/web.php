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
Route::view('login','livewire.home')->name('login');
Route::get('/','ShopController@index')->middleware('auth')->name('shop');
Route::get('/admin','AdminController@admin')->middleware('auth')->name('admin');
Route::get('/logout', 'loginController@logout')->name('logout');
Route::get('/cart','CartController@index')->middleware('auth')->name('cart');
Route::get('/user','UserController@index')->middleware('auth')->name('user');
Route::post('/login','loginController@passreset')->name('mail');
Route::post('/', 'ShopController@createcookie')->middleware('auth')->name('cookie');
