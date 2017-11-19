<?php

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
   return view('auth/login');
});

Route::resource('store/usuario','UsuarioController');
Route::resource('store/pqturistico','PaqueteTuristicoController');
Route::resource('store/hotel','HotelController');
Route::resource('store/restaurante','RestauranteController');
Route::resource('store/destino','DestinoController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
