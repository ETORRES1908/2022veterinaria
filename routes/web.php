<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');

Route::get('/about', 'HomeController@about')->name('about');

Route::get('/contact', 'HomeController@contact')->name('contact');

Route::resource('/profile', 'Usuario\ProfileController');

Route::resource('events', 'Evento\EventoController');
Route::resource('/participants', 'Evento\LParticipantesController');
Route::resource('/duels', 'Evento\DuelosController');
Route::resource('/coliseums', 'Evento\ColiseoController');

//USER CONTROLLER
Route::group(['middleware' => ['can:addanimal']], function () {
    Route::resource('/mascotas', 'Usuario\MascotasController');
    Route::resource('/mfotos', 'Usuario\MFotosController');
    Route::resource('/mvideos', 'Usuario\MVideosController');
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
