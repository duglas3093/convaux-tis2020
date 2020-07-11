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
Route::get('/convocatorias/{id}', 'AnnouncementsController@goToAnnouncementView')->name('announcementView');
Route::post('/convocatorias{id}', 'AnnouncementsController@publishAnnouncement')->name('announcementPublish');
// Fechas
Route::get('/convocatorias/{id}/fijar-fechas', 'AnnouncementDatesController@goDatesForm')->name('announcementDates');
Route::post('/convocatorias/{id}/fijar-fechas', 'AnnouncementDatesController@setDates')->name('announcementSetDates');
// Requisitos
Route::post('/convocatorias/{id}/fijar-requisitos', 'AnnouncementsController@setRequirement')->name('announcementSetRequirement');
// Requerimientos
Route::get('/convocatorias/{id}/fijar-requerimientos', 'AnnouncementRequestsController@goRequestsForm')->name('announcementRequests');
Route::post('/convocatorias/{id}/fijar-requerimientos', 'AnnouncementRequestsController@addRequest')->name('announcementAddRequests');
// Tabla de Conocimientos
Route::post('/convocatorias/{id}/fijar-conocimiento', 'AnnouncementsController@setKnowledgeDescription')->name('announcementSetKnowledgeDescription');
Route::post('/convocatorias/{id}/fijar-criterio-para-conocimiento', 'AnnouncementsController@setKnowledgeDetail')->name('announcementSetKnowledgeDetail');
// Detalle Requerimiento Para AUXILIATURA A LABORATORIO
Route::get('/convocatorias/{id}/requerimiento/{requestId}', 'RequestController@goRequestDetail')->name('requestView');
Route::post('/convocatorias/{id}/requerimiento/{requestId}', 'RequestController@setTematicaToRequest')->name('addTematica');
// Tabla de Meritos
Route::post('/convocatorias/{id}/merito', 'AnnouncementsController@setMeritDescription')->name('announcementSetMeritDescription');
Route::post('/convocatorias/{id}/meritoDetalle', 'AnnouncementsController@setMeritDetail')->name('announcementSetMeritDetail');
// Secretaria
Route::get('/habilitar-estudiante', 'SecretaryController@allowStudentsForm')->name('allowStudentsForm');
Route::post('/habilitar-estudiante', 'SecretaryController@allowStudent')->name('allowStudent');