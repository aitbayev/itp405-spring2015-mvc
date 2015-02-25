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

Route::get('/', 'WelcomeController@index');
Route::get('/dvds/search', 'DvdsController@search');
Route::get('/dvds', 'DvdsController@results');
Route::get('/dvds/{id}', 'DvdsController@review');
Route::post('dvds/addreview', 'DvdsController@addReview');