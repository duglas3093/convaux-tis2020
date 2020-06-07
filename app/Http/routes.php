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

Route::get('/', 'FrontController@getIndex')->name('homepage');
Route::get('/avisos', 'FrontController@getNotices')->name('avisos');
Route::get('/contacto', 'FrontController@getcontact')->name('contacto');
Route::get('/aviso','FrontController@getShowNotice')->name('aviso');

Route::auth();

Route::get('/home', 'HomeController@index');
// console
Route::resource('/console', 'ConsoleController');

// Gestiones del administrador
Route::get('/gestiones', 'GestionController@index')->name('gestiones');
Route::get('/gestiones/crear', 'GestionController@createForm')->name('gestionesForm');
Route::post('gestiones/crear', 'GestionController@create')->name('gestionesCrear');

// Funciones de las Convocatorias (Announcements)
Route::get('/convocatorias', 'AnnouncementsController@announcementsList')->name('announcementsList');
Route::get('/convocatorias/crear', 'AnnouncementsController@announcementsForm')->name('announcementsForm');
Route::post('/convocatorias/crear', 'AnnouncementsController@createAnnouncement')->name('announcementsCreate');