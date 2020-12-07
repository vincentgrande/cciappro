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
Route::get('/parametres','loginController@parametres')->middleware('auth')->name('parametres');
Route::get('/parametresadmin','paramController@admin')->middleware('auth')->name('parametresadmin');
Route::get('/parametresadmin&{id}&{name}&{firstname}&{mail}','paramController@adminWithParametres')->middleware('auth')->name('parametresadminparam');
Route::get('/gestiondesstocks','AdminController@gestionstock')->middleware('auth')->name('gestionStock');
Route::get('/contact','UserController@contact')->middleware('auth')->name('contact');
Route::post('/cart' , 'CartController@delete')->middleware('auth')->name('delete');
Route::post('/modifcart' , 'CartController@modifcart')->middleware('auth')->name('modifcart');
Route::post('/login','loginController@passreset')->name('mail');
Route::post('/', 'ShopController@createcookie')->middleware('auth')->name('cookie');
Route::post('/submit', 'CartController@commander')->middleware('auth')->name('commander');
Route::post('/parametres','loginController@changePassword')->middleware('auth')->name('changePassword');
Route::post('/modifUserPassword', 'paramController@changePassword')->middleware('auth')->name('modifMdp');
Route::post('/supprUser','paramController@supprUser')->middleware('auth')->name('supprUser');
Route::post('/modifUser','paramController@modifUser')->middleware('auth')->name('modifUser');
Route::post('/admin','AdminController@valideCommande')->middleware('auth')->name('valideCommande');
Route::post('/admin2','AdminController@auditerLivraison')->middleware('auth')->name('auditerLivraison');
Route::post('/admin3','AdminController@refuserCommande')->middleware('auth')->name('refuserCommande');
Route::post('/modifierQqtProduit','AdminController@modifierQqtProduit')->middleware('auth')->name('modifierQqtProduit');
Route::post('/visibiliteProduit','AdminController@visibiliteProduit')->middleware('auth')->name('visibiliteProduit');
Route::post('/contact','UserController@contactEnvoi')->middleware('auth')->name('contactAdmin');



