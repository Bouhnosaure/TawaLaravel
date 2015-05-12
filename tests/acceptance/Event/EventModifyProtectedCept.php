<?php
$I = new AcceptanceTester($scenario);

$I->am('an user');
$I->wantTo('Modify an event witch is not mine');

//setup
$I->amLoggedAs(\App\User::find(6));

//test
$I->amOnAction('EventsController@edit', ['id' => 1]);

//assert
$I->seeCurrentActionIs('PagesController@index');



