<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('inicio');
});

Route::get('Nosotros', function()
{
	return View::make('nosotros.nosotros');
});

Route::get('Cotactenos', function()
{
	return View::make('nosotros.contacto');
});

