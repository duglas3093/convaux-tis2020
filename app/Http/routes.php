<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// Homepage
Route::get('/', 'FrontController@getIndex');
Route::resource('/convocatorias', 'CallsController');
Route::get('/avisos', 'FrontController@getNotices');
Route::get('/contacto', 'FrontController@getcontact');
Route::get('/aviso','FrontController@getShowNotice');

Route::auth();

Route::get('/home', 'HomeController@index');
// console
Route::resource('/console', 'ConsoleController');
