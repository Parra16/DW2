<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'PageController@registro');//index

Route::get('login','PageController@login')->name('loginn');//login

Route::get('/', 'PageController@registrolo')->name('loginn2');//index desde login


Route::get('inicioadmin', 'PageController@inicioadmin')->name('inicioad');//inico admin

Route::get('inicioempl', 'PageController@iniciousuario')->name('inicioemp');//inico usuario

Route::get('registroempleados', 'PageController@registroempleados')->name('regem');//registro empleados

Route::get('listaempleados', 'PageController@listaempleados')->name('listaem');//lista empleados

Route::get('cambiocont', 'PageController@cambiocontrasena')->name('camcon');//cambio contraseña

Route::get('repempleados', 'PageController@reportesempleados')->name('repemps');//lista reportes empelados

Route::get('infocontacto/{id}', 'PageController@infocontacto')->name('infocont');//informacion contacto

Route::get('reportes/{id}', 'PageController@userreportes')->name('userrep');//reportes usuario

Route::post('registroempleados','PageController@registroemp')->name('registraemp');

