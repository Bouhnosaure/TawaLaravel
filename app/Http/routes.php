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

use Intervention\Image\Facades\Image;

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    //Pages Misc
    Route::get('/', array('uses' => 'PagesController@index'));
    Route::get('home', array('uses' => 'PagesController@index'));
    Route::get('about', array('uses' => 'PagesController@about'));


    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', array('uses' => 'UsersController@index'));
        Route::get('edit', array('uses' => 'ProfileController@edit'));
        Route::patch('edit', array('uses' => 'ProfileController@update'));
        Route::patch('upload', array('uses' => 'ProfileController@upload'));
        Route::get('{slug}', array('uses' => 'ProfileController@show'));
    });

    Route::group(['prefix' => 'my'], function () {
        Route::get('carpoolings', array('uses' => 'UsersController@carpoolings'));
        Route::get('events', array('uses' => 'UsersController@events'));
    });


    //Confirmations
    Route::group(['prefix' => 'confirmation'], function () {
        Route::get('/', array('uses' => 'Auth\ConfirmationController@index'));
        Route::get('send/{type}', array('uses' => 'Auth\ConfirmationController@send'));
        Route::get('phone', array('uses' => 'Auth\ConfirmationController@submitPhoneCode'));
        Route::post('phone', array('uses' => 'Auth\ConfirmationController@handlePhoneCode'));
        Route::get('mail/{code}', array('uses' => 'Auth\ConfirmationController@confirmMailCode'));
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

    Route::get('images/{dir}/{img}', function ($dir, $img) {
        // serve an image with cache !
        // determine a lifetime and return as object instead of string
        $photo = Image::cache(function ($image) use ($dir, $img) {
            return $image->make(storage_path() . '/app/images/' . $dir . '/' . $img);
        }, 1, false);

        return Response::make($photo, 200, array('Content-Type' => 'image/jpeg'));

    });

});
