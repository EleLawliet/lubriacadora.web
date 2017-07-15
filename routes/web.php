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

Route::post('/eliminaTipoServicio',  'Servicios\TipoServicioController@eliminaTipoServicio');
Route::post('/guardarTipoServicio',  'Servicios\TipoServicioController@guardarTipoServicio');
Route::post('/cambioEstado',     'Servicios\TipoServicioController@cambioEstado');
//   Fin //

// --Inicio Pantalla de Cliente Automovil

Route::resource('/cliente',  'Referencial\ClienteController');
Route::post('/ingresoClienteVehiculo',  'Referencial\ClienteController@ingresoClienteVehiculo');
Route::post('/cargarPorCedula',  'Referencial\ClienteController@cargarPorCedula');

// --Inicio Pantalla de Clase vehicuo servicio
Route::resource('/claseVehiculoServicio',  'Referencial\ClaseVehiculoServicioController');
Route::post('/guardarClaseServicio',  'Referencial\ClaseVehiculoServicioController@guardarClaseServicio');
Route::post('/validaClaseVehiculoXtipoServicio',  'Referencial\ClaseVehiculoServicioController@validaClaseVehiculoXtipoServicio');

