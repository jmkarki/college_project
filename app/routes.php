<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

App::missing(function($exception)
{
    return '404 error';
});

Route::group(array('before'=>'guest'), function(){
	Route::get('/', 'LoginController@getIndex');
	Route::controller('login', 'LoginController');
	// Route::controller('error','ErrorController');

});
//Put the login protected routes below
	Route::group(array('before'=>'auth'), function(){
	Route::controller('home','HomeController');
	// Route::controller('logout','LogoutController');
	Route::controller('sales','DirectSalesController');
});
