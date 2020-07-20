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
// COMENTADO DEBIDO A QUE LLAMA AL RECURSO DE CALLSCONTROLLER NO A ANNOUCEMENTSCONTROLLER
// Route::resource('/convocatorias', 'CallsController');
Route::get('/avisos', 'FrontController@getNotices')->name('avisos');
Route::get('/contacto', 'FrontController@getcontact');
Route::get('/aviso','FrontController@getShowNotice');

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
Route::get('/convocatorias/{id}/fechas', 'AnnouncementDatesController@goDatesForm')->name('announcementDates');
Route::post('/convocatorias/{id}/fechas', 'AnnouncementDatesController@setDates')->name('announcementSetDates');
// Requisitos
Route::post('/convocatorias/{id}/requisitos', 'AnnouncementsController@setRequirement')->name('announcementSetRequirement');
// Requerimientos
Route::get('/convocatorias/{id}/requerimiento', 'AnnouncementRequestsController@goRequestsForm')->name('announcementRequests');
Route::post('/convocatorias/{id}/requerimiento', 'AnnouncementRequestsController@addRequest')->name('announcementAddRequests');
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
Route::get('/habilitacion-estudiante', 'SecretaryController@allowStudentsForm')->name('allowStudentsForm');
Route::post('/habilitacion-estudiante', 'SecretaryController@allowStudent')->name('allowStudent');
// SECRETARIA:  lista de postulates
Route::get('/convocatorias/{id}/postulantes', 'SecretaryController@goPostulantsList')->name('postulantsList');
Route::get('/convocatorias/{id}/postulantes/{userId}', 'SecretaryController@goPostulantViewForm')->name('postulantViewForm');

// POSTULANTE
Route::get('/convocatorias/{id}/requerimiento/{requestId}/postulacion', 'StudentController@postulationForm')->name('postulateForm');
Route::post('/convocatorias/{id}/requerimiento/{requestId}/postulacion', 'StudentController@postulate')->name('postulate');
// POSTULANTE: subir archivos de requisitos
Route::get('/convocatorias/{id}/requerimiento/{requestId}/postulacion/{code}/requisitos', 'PostulantController@uploadFilesForm')->name('uploadFilesForm');
Route::post('/convocatorias/{id}/subirRequisitos', 'PostulantController@uploadFiles')->name('uploadFiles');
// POSTULANTE: postulaciones
Route::get('/postulaciones/{userId}', 'PostulantController@goPostulationsList')->name('postulationsList');

Route::resource('/notice', 'console\notice\NoticeController');
Route::resource('/calls', 'console\Admin\CallController');
Route::resource('/postulant', 'console\Postulant\PostulantController');
Route::resource('/document', 'console\Postulant\DocumentController');
Route::get('/index_cod', 'console\Postulant\DocumentController@index_cod');
Route::resource('/authcode', 'AuthcodeController');
