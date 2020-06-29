<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'RegistroEntradaController@registro');//index

Route::get('/', 'RegistroEntradaController@registro')->name('index');//index desde login

Route::put('/', 'RegistroEntradaController@registraentrada')->name('regentrada');///registra entrada


Route::get('login','LoginController@login')->name('loginn');//login
Route::post('login', 'LoginController@entrar')->name('entrar');//entar
Route::put('login', 'LoginController@recuperar')->name('recupe');//recuperar

Route::view('inicio_AD{id}', 'InicioAdmin')->name('inicioa');//inico admin
Route::view('inicio_US{id}', 'InicioUsua')->name('iniciob');//inico usuario


Route::get('registro_empleados', 'RegEmplController@registroempleados')->name('regem');//registro empleados
Route::post('registroempleados','RegEmplController@registroemp')->name('registraemp');


Route::get('listaempleados', 'ListaEmplController@listaempleados')->name('listaem');//lista empleados
Route::put('listaempleados', 'ListaEmplController@actualiza')->name('actualizaemp');//lista empleados



Route::get('cambiocont', 'ModifContraController@paginacontrasena')->name('pagcontra');//contraseña pagina
Route::put('cambiocont', 'ModifContraController@cambiocontrasena')->name('camcon');//cambio contraseña

Route::get('repempleados', 'ReportesUsuariosController@reportesempleados')->name('repemps');//lista reportes empelados
Route::post('repempleados', 'ReportesUsuariosController@registrareporte')->name('regrep');//registra reportes
//Route::delete('repempleados/{id}', 'ReportesUsuariosController@eliminareporte')->name('eliminarep');//elimina reportes empelados


Route::get('infocontacto', 'InformacionContactoController@infocontacto')->name('infocont');//informacion contacto
Route::put('infocontacto', 'InformacionContactoController@editarinf')->name('editar.infocontacto');//informacion contacto


Route::get('reportes', 'ReportesUsuariosController@userreportes')->name('userrep');//reportes usuario


