<?php
sleep(2);
$I = new FunctionalTester($scenario);

//setup
$I->am('a user');
$I->wantTo('activate my phone number');
$I->amLoggedAs(\App\User::find(1));
$I->amOnPage('/confirmation');

//action
//step1
$I->click('#submit-phone-code');

//step2
$I->receiveAnEmailFromEmail('admin@tawa.com');
$I->receiveAnEmailWithSubject('Confirmation Code');

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
$I->dontSeeRecord('users', ['id' => 1, 'phone_confirmed' => 1]);