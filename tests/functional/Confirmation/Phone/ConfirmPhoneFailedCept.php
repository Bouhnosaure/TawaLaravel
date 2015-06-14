<?php
$I = new FunctionalTester($scenario);
$I->resetEmails();

//setup
$I->am('a user');
$I->wantTo('activate my phone number with wrong code');
$I->amLoggedAs(\App\User::find(1));
$I->amOnPage('/confirmation');

//action
//step1
$I->click('#submit-phone-code');

//step2
$I->seeInLastEmail('admin@tawa.com');
$I->seeInLastEmail('Confirmation Code');

//step3
$I->seeRecord('users_confirmations', ['user_id' => 1, 'type' => 'phone']);

//step4
$I->seeCurrentUrlEquals('/confirmation/phone');
$I->fillField(['name' => 'code'], '0000');
$I->click('submit-confirmation-code');
$I->seeCurrentUrlEquals('/confirmation/phone');

//step5
$I->amOnPage('/confirmation');
$I->seeElement('#submit-phone-code');
$I->dontSeeRecord('user_profiles', ['user_id' => 1, 'phone_confirmed' => 1]);