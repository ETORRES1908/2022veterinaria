<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');

Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/find', 'HomeController@findperson')->name('findperson'); //BUSCADOR
Route::get('/person/{id}', 'HomeController@person')->name('person'); //USUARIO
Route::post('/reset', 'HomeController@reset')->name('reset');

/* PROFILE */
Route::resource('/profile', 'Usuario\ProfileController'); //PERFIL

/* EVENTO CONTROLLER */
Route::resource('events', 'Evento\EventoController');
Route::resource('/participants', 'Evento\LParticipantesController');
Route::resource('/pactados', 'Evento\DuelosController');
Route::resource('/coliseums', 'Evento\ColiseoController');

//USER CONTROLLER
Route::group(['middleware' => ['can:addanimal']], function () {
    Route::resource('/mascotas', 'Usuario\MascotasController');
    Route::resource('/mfotos', 'Usuario\MFotosController');
    Route::resource('/mvideos', 'Usuario\MVideosController');
    Route::post('/dvcns/{id}', 'Usuario\EditMascotaController@deleteVCNS')->name('delete_vcns'); //DELETE VACUNA
    Route::post('/cvcns', 'Usuario\EditMascotaController@creteVCNS')->name('create_vcns'); //CREATE VACUNA
    Route::post('/dmvds/{id}', 'Usuario\EditMascotaController@deleteMVDS')->name('delete_mvds'); //DELETE MOVIDAS
    Route::post('/cmvds', 'Usuario\EditMascotaController@creteMVDS')->name('create_mvds'); //CREATE MOVIDAS
    Route::post('/dsmtp/{id}', 'Usuario\EditMascotaController@deleteSMPT')->name('delete_smpt'); //DELETE SUPLEMENTOS
    Route::post('/csmtp', 'Usuario\EditMascotaController@creteSMPT')->name('create_smpt'); //CREATE SUPLEMENTOS
    Route::post('/url1', 'Usuario\EditMascotaController@url1')->name('url1');
    Route::post('/url2', 'Usuario\EditMascotaController@url2')->name('url2');
});

//ADMIN CONTROLLER
Route::group(['middleware' => ['can:cms']], function () {
    Route::resource('/usuarios', 'Administrador\UsersController');
    Route::resource('/mmascotas', 'Administrador\MascotasController');
    Route::resource('/meventos', 'Administrador\EventosController');
    Route::resource('/mcoliseos', 'Administrador\ColiseosController');
    Route::resource('/mbanners', 'Administrador\BannersController');
});

Route::get('language/{locale}', 'HomeController@language')->name('language');
