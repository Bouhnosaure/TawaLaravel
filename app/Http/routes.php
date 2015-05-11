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

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    //Pages Misc
    Route::get('/',                 array('uses' => 'PagesController@index'));
    Route::get('home',              array('uses' => 'PagesController@index'));
    Route::get('about',             array('uses' => 'PagesController@about'));


    Route::group(['prefix' => 'user'], function () {
        Route::get('tawaboard',             array('uses' => 'UsersController@index'));
        Route::get('profile/{slug}',    array('uses' => 'UsersController@show'));
        Route::get('preferences',   array('uses' => 'UsersController@edit'));
        Route::patch('preferences',   array('uses' => 'UsersController@update'));
        Route::get('carpoolings',   array('uses' => 'UsersController@carpoolings'));
        Route::get('events',        array('uses' => 'UsersController@events'));
    });


    //Confirmations
    Route::group(['prefix' => 'confirmation'], function () {
        Route::get('/',             array('uses' => 'Auth\ConfirmationController@index'));
        Route::get('send/{type}',   array('uses' => 'Auth\ConfirmationController@send'));
        Route::get('phone',         array('uses' => 'Auth\ConfirmationController@submitPhoneCode'));
        Route::post('phone',        array('uses' => 'Auth\ConfirmationController@handlePhoneCode'));
        Route::get('mail/{code}',   array('uses' => 'Auth\ConfirmationController@confirmMailCode'));
    });

    //Restful events
    Route::resource('events', 'EventsController');

    //Restful carpoolings
    Route::resource('carpoolings', 'CarpoolingsController');

    //Authentication
    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController'
    ]);

});

