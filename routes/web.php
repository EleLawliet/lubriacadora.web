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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//  -- Inicio  Wsdl de android 
Route::get('/comunidades/listado', 'LubricadoraWsdl\LubricadoraWsdlController@getListado');

// con parametro
Route::get('/datosCliente', 'LubricadoraWsdl\LubricadoraWsdlController@datosXCliente');
//   Fin   //


//   -- Inicio Pantalla de Tipo de servicios
Route::resource('/tipoServicio',  'Servicios\TipoServicioController');

//   Fin //