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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/lista_carros', 'CarroController@index')->name('lista_carros');
Route::post('/encontrar_carros', 'CarroController@encontrar_carros')->name('encontrar_carros');
Route::post('/apagar_carros', 'CarroController@destroy')->name('apagar_carros');