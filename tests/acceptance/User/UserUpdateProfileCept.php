<?php
$I = new AcceptanceTester($scenario);

$I->am('an user');
$I->wantTo('Update my profile');

//setup
$I->amLoggedAs(\App\User::find(1));
$I->amOnAction('UsersController@edit');

//save
$_username = $I->grabTextFrom('#username');
$_firstname = $I->grabTextFrom('#firstname');
$_lastname = $I->grabTextFrom('#lastname');
$_email = $I->grabTextFrom('#email');
$_phone = $I->grabTextFrom('#phone');


//modify user
$I->fillField(['name' => 'username'], 'CITROTREX');
$I->fillField(['name' => 'firstname'], 'John');
$I->fillField(['name' => 'lastname'], 'Doe');
$I->fillField(['name' => 'email'], 'johndoe@foe.com');
$I->fillField(['name' => 'phone'], '+33616391876');
$I->click('submit-edit');

//assert
$I->cantSeeInField(['name' => 'username'], $_username);
$I->cantSeeInField(['name' => 'firstname'], $_firstname);
$I->cantSeeInField(['name' => 'username'], $_lastname);
$I->cantSeeInField(['name' => 'email'], $_email);
$I->cantSeeInField(['name' => 'phone'], $_phone);


//reset user test
$I->fillField(['name' => 'username'], $_username);
$I->fillField(['name' => 'firstname'], $_firstname);
$I->fillField(['name' => 'lastname'], $_lastname);
$I->fillField(['name' => 'email'], $_email);
$I->fillField(['name' => 'phone'], $_phone);
$I->click('submit-edit');

//assert
$I->seeInField(['name' => 'username'], $_username);
$I->seeInField(['name' => 'firstname'], $_firstname);
$I->seeInField(['name' => 'username'], $_lastname);
$I->seeInField(['name' => 'email'], $_email);
$I->seeInField(['name' => 'phone'], $_phone);


