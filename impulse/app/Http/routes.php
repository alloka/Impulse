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
//Route::resource('payment', 'PaypalPaymentController');

Route::group(['middleware' => ['web','auth','supervisorAdmin']], function () {
	    Route::resource('users/{id}/edit?', 'UserController@editUser');
});

Route::group(['middleware' => ['web', 'auth']], function () {
	Route::get('alloka', 'DashboardController@index');
	Route::resource('customers', 'CustomerController');
	Route::post('tickets/close','TicketsController@close');
	Route::resource('tickets', 'TicketsController');
	Route::resource('users', 'UserController');
	Route::post('tickest/addComment','TicketsController@addComment');
	Route::get('auth/login', 'AuthController@getLogin');
	Route::post('auth/login', 'AuthController@postLogin');
	Route::get('auth/logout', 'AuthController@getLogout');
	Route::post("users/claimTicket", 'UserController@claimTicket');
	Route::post("users/assignTicket", 'UserController@assignTicket');
	Route::resource("users/assign/{ticket_id}", 'UserController@assign');
	Route::get('users/', 'UserController@index');
	Route::get('users/newSupportAgent', 'UserController@newSupportAgent');
	Route::post('users', 'UserController@newUser');
	Route::get('users/delete/{id}', 'UserController@deleteUser');
	Route::get('users/{id}', 'UserController@getUser');
	Route::resource('users/editUser/{id}', 'UserController@editUser');


});

