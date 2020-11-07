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
Route::get('/','ShopController@index')->middleware('auth')->name('shop');
Route::get('/admin','AdminController@admin')->middleware('auth')->name('admin');
Route::view('login','livewire.home')->name('login');
Route::get('/logout', 'loginController@logout')->name('logout');;
Route::get('/mail/{mail}/{mess}','loginController@passreset')->name('mail');
