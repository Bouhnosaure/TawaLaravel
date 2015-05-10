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

Route::group(['prefix' => LaravelLocalization::setLocale()], function() {

    Route::get('/', array('as' => 'home', 'uses' => 'PagesController@index'));
    Route::get('home', array('as' => 'home', 'uses' => 'PagesController@index'));
    Route::get('about', array('as' => 'about', 'uses' => 'PagesController@about'));

    Route::get('confirmation', array('as' => 'confirmation', 'uses' => 'Auth\ConfirmationController@index'));
    Route::get('confirmation/send/{type}', array('as' => 'confirmation.send', 'uses' => 'Auth\ConfirmationController@send'));
    Route::get('confirmation/phone', array('as' => 'confirmation.submitphonecode', 'uses' => 'Auth\ConfirmationController@submitPhoneCode'));
    Route::post('confirmation/phone', array('as' => 'confirmation.handlephonecode', 'uses' => 'Auth\ConfirmationController@handlePhoneCode'));
    Route::get('confirmation/mail/{code}', array('as' => 'confirmation.code', 'uses' => 'Auth\ConfirmationController@confirmMailCode'));

    Route::resource('events', 'EventsController');
    Route::resource('carpoolings', 'CarpoolingsController');

    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController'
    ]);

});

