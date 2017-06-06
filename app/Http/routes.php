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

Route::get('/', function () {
    return view('welcome');
});

// List
Route::get('client', 'ClientController@index');
// Create
Route::post('client', 'ClientController@store');
// Read
Route::get('client/{id}', 'ClientController@show');
// Update
Route::put('client/{id}', 'ClientController@update');
// Delete
Route::delete('client/{id}', 'ClientController@destroy');
