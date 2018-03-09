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

Route::get('/', 'usuarioController@index');
Route::post('ValidarInicio', 'usuarioController@ingresar')->name("ValidarInicio");
Route::get('RegistrarUsuario', 'usuarioController@create')->name("RegistrarUsuario");
Route::post('GuardarUsuario', 'usuarioController@store')->name("GuardarUsuario");
Route::get('Inicio', 'usuarioController@inicio')->name("Inicio");
Route::post('GuardarReseva', 'reservaController@store')->name("GuardarReseva");
Route::get("obtenerSillas", 'reservaController@obtenerSillas')->name("obtenerSillas");
Route::get("EliminarReservaSilla/{id_unico}", 'reservaController@eliminarRelacionReserva')->name("EliminarReservaSilla");
Route::get("CerrarSesion", "usuarioController@salir")->name("CerrarSesion");
Route::get("ListadoReservaciones", "reservaController@listadoReservacionesUsuario")->name("ListadoReservaciones");
Route::get("ActualizarUsuario/{id}", "usuarioController@update")->name("ActualizarUsuario");
Route::post("GuardarActualizacion", "usuarioController@actualizarUsuario")->name("GuardarActualizacion");
Route::get("ListadoUsuario", "usuarioController@listarUsuarios")->name("ListadoUsuario");