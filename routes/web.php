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
Route::get('/vehicle-cliente/{cedula}', 'LubricadoraWsdl\LubricadoraWsdlController@datosVehicleXCliente');
Route::get('/DetServicios-cliente/{cliente_vehiculo_id}', 'LubricadoraWsdl\LubricadoraWsdlController@detServiciosXvehiculo');
Route::get('/Tips', 'LubricadoraWsdl\LubricadoraWsdlController@datosTips');


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

// --Inicio Pantalla de Clase vehicuo servicio

Route::resource('/serviciosCliente',  'Transaccional\ServiciosClienteController');
Route::post('/buscarserviciosPorClaseVehiculo',  'Transaccional\ServiciosClienteController@buscarserviciosPorClaseVehiculo');
Route::post('/calculaServicos',  'Transaccional\ServiciosClienteController@calculaServicos');
Route::post('/ingresoServiciosCliente',  'Transaccional\ServiciosClienteController@ingresoServiciosCliente');
Route::post('/cargarPorSolicitudClienetVehiculo',     'Transaccional\ServiciosClienteController@cargarPorSolicitudClienetVehiculo');

// Insumos

Route::resource('/insumos',  'Servicios\InsumosController');
Route::post('/guardarInsumos',  'Servicios\InsumosController@guardarInsumos');
Route::post('/cambioEstadoInsumo',     'Servicios\InsumosController@cambioEstadoInsumo');
Route::post('/validaNombreInsumos',     'Servicios\InsumosController@validaNombreInsumos');


//
Route::resource('/reporteServicios',  'Reporte\ReporteServiciosController');
Route::post('/cargarPorFechaServicios',  'Reporte\ReporteServiciosController@cargarPorFechaServicios');

