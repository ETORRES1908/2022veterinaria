<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');

Route::get('/about', 'HomeController@about')->name('about');

Route::get('/contact', 'HomeController@contact')->name('contact');

Route::resource('events', 'Evento\EventoController');
Route::resource('/participants', 'Evento\LParticipantesController');
Route::resource('/duels', 'Evento\DuelosController');
Route::resource('/coliseums', 'Evento\ColiseoController');

//USER CONTROLLER
Route::group(['middleware' => ['can:MyPets']], function () {
    Route::resource('/mascotas', 'Usuario\MascotasController');
    Route::resource('/mfotos', 'Usuario\MFotosController');
    Route::resource('/mvideos', 'Usuario\MVideosController');
});

//ADMIN CONTROLLER
Route::group(['middleware' => ['can:Mantenimientos']], function () {
    Route::resource('/usuarios', 'Administrador\UsersController');
    Route::resource('/mmascotas', 'Administrador\MascotasController');
    Route::resource('/meventos', 'Administrador\EventosController');
    Route::resource('/mcoliseos', 'Administrador\ColiseosController');
    Route::resource('/mbanners', 'Administrador\BannersController');
});

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session(['locale' => $locale]);
    return redirect(url(URL::previous()));
})->name('language');
