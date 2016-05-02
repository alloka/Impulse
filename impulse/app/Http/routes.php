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
Route::get('users/', 'UserController@index');
Route::get('users/newSupportAgent', 'UserController@newSupportAgent');
Route::post('users', 'UserController@newUser');
Route::get('users/delete/{id}', 'UserController@deleteUser');
Route::get('users/{id}', 'UserController@getUser');

Route::group(['middleware' => ['web']], function () {
	Route::get('alloka', 'DashboardController@index');
	Route::resource('customers', 'CustomerController');
Route::resource('tickets', 'TicketsController');
   
    
});