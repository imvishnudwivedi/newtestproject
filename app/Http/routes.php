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



Route::group(['prefix' =>'blog','namespace' => 'blog'], function () {

    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
	
	

    Route::group(['prefix' => 'masters', 'namespace' => 'masters'], function () {

		// blog masters
Route::resource('blog', 'BlogController');



});


function getFormatedDate($date) {
	$formated_date = date("d F Y", strtotime($date));
	return $formated_date;
}