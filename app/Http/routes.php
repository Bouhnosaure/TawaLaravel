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

Route::get('/', array('as' => 'home', 'uses' => 'PagesController@index'));
Route::get('about', array('as' => 'about', 'uses' => 'PagesController@about'));

Route::get('events', array('as' => 'events.index', 'uses' => 'EventsController@index'));
Route::get('events/create', array('as' => 'events.create', 'uses' => 'EventsController@create'));
Route::get('events/{id}', array('as' => 'events.show', 'uses' => 'EventsController@show'));
Route::post('events', array('as' => 'events.store', 'uses' => 'EventsController@store'));



