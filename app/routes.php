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
Blade::setContentTags('[[', ']]');
Blade::setEscapedContentTags('[[[', ']]]');

App::missing(function($exception)
{
    return '404 error';
});

Route::group(array('before'=>'guest'), function(){
	Route::get('/', 'LoginController@getIndex');
	Route::controller('login', 'LoginController');
	Route::controller('register', 'RegisterController');
});

// Put the login protected routes below
Route::group(array('before'=>'auth'), function(){
	Route::controller('home','HomeController');
	Route::controller('admin','AdminController');
	Route::controller('cheques','ChequesController');
	Route::controller('customer','CustomerController');
	Route::controller('employee','EmployeeController');
	Route::controller('payment','PaymentController');
	Route::controller('product','ProductController');
	Route::controller('purchase','PurchaseController');
	Route::controller('report','ReportController');
	Route::controller('sales','SalesController');
	Route::controller('supplier','SupplierController');
	Route::controller('logout','LogoutController');
});

