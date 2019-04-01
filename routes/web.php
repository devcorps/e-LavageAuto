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

Route::get('/', 'PagesController@getIndex')->name('/');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('about', 'PagesController@getAbout')->name('about');

Route::get('contact', 'PagesController@getContact')->name('contact');

Route::get('terms', 'PagesController@getTerms')->name('terms');

Route::get('profile', 'UserController@profile')->name('profile');

Route::get('reporting', 'UserController@reporting')->name('reporting');

Route::post('profile', 'UserController@update_logo');

Route::post('edit', 'UserController@edit');

Route::post('change_Password', 'UserController@change_Password');

Route::resource('client', 'ClientController');

Route::resource('lavage', 'LavageController');

Route::resource('vehicule', 'VehiculeController');

Route::get('fideles', 'ClientController@fideles')->name('fideles');

Route::get('/loyal/{id}', 'ClientController@loyal');

Route::resource('passage', 'PassageController');

Route::post('addPass','PassageController@addPass')->name('addPass');

Route::post('newPass','PassageController@newPass')->name('newPass');

Route::get('client/{id}/bonus','ClientController@sendBonus')->name('bonus');

Route::get('client/{id}/encouragement','ClientController@sendEncouragement')->name('encouragement');

Route::post('recherche', 'HomeController@search')->name('recherche');