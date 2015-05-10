<?php
$I = new FunctionalTester($scenario);

//setup
$I->am('a guest');
$I->wantTo('register an account');

//action
$I->amOnPage('/auth/register');
$I->see('Inscription');
$I->fillField(['name' => 'username'], 'JohnDoe');
$I->fillField(['name' => 'firstname'], 'John');
$I->fillField(['name' => 'lastname'], 'Doe');
$I->fillField(['name' => 'email'], 'john.doe@mail.com');
$I->fillField(['name' => 'phone'], '0603050405');
$I->fillField(['name' => 'password'], 'password');
$I->fillField(['name' => 'password_confirmation'], 'password');
$I->click('submit-register');

//verify
$I->seeCurrentActionIs('EventsController@index');
$I->canSeeAuthentication();
$I->seeRecord('users', array('email' => 'john.doe@mail.com'));

