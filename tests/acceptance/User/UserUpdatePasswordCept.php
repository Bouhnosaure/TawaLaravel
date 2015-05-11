<?php
$I = new AcceptanceTester($scenario);

$I->am('an user');
$I->wantTo('Update my profile');

//setup
$I->amLoggedAs(\App\User::find(1));
$I->amOnAction('UsersController@edit');




