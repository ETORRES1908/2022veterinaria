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

Route::resource('/profile', 'Usuario\ProfileController'); //PERFIL

Route::resource('events', 'Evento\EventoController');
Route::resource('/participants', 'Evento\LParticipantesController');
Route::resource('/pactados', 'Evento\DuelosController');
Route::resource('/coliseums', 'Evento\ColiseoController');

//USER CONTROLLER
Route::group(['middleware' => ['can:addanimal']], function () {
    Route::resource('/mascotas', 'Usuario\MascotasController');
    Route::resource('/mfotos', 'Usuario\MFotosController');
    Route::resource('/mvideos', 'Usuario\MVideosController');
    Route::post('/dsmtp/{id}', 'Usuario\EditMascotaController@deleteSMPT')->name('delete_smpt');
    Route::post('/csmtp', 'Usuario\EditMascotaController@creteSMPT')->name('create_smpt');
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
