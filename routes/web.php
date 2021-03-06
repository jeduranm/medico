<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/bienvenido', function () {
    return view('bienvenido');
});
*/

Route::get('/', 'FrontendController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('boxs', 'BoxController');

Route::resource('services', 'ServiceController');

Route::resource('medicos', 'MedicoController');

Route::resource('facilities', 'FacilityController');

Route::resource('partners', 'PartnerController');

Route::resource('menues', 'MenuController');
