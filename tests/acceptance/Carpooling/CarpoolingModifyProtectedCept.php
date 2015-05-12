<?php 
$I = new AcceptanceTester($scenario);
$I->am('an user');
$I->wantTo('Modify to a Carpooling witch is not mine');

//setup
$I->amLoggedAs(\App\User::find(6));

//test
$I->amOnAction('CarpoolingsController@edit', ['id' => 1]);

//assert
$I->seeCurrentActionIs('PagesController@index');
