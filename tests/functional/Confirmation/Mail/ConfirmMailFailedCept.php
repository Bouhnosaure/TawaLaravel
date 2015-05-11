<?php
sleep(2);
$I = new FunctionalTester($scenario);

//setup
$I->am('a user');
$I->wantTo('activate my email adress with bad code');
$I->amLoggedAs(\App\User::find(1));
$I->amOnPage('/confirmation');

//action
//step1
$I->click('#submit-mail-code');

//step2
$I->receiveAnEmailFromEmail('admin@tawa.com');
$I->receiveAnEmailWithSubject('Confirmation Code');

//step3
$I->seeRecord('users_confirmations', ['user_id' => 1, 'type' => 'mail']);

//step4
$code = $I->grabRecord('users_confirmations', ['user_id' => 1, 'type' => 'mail']);
$I->amOnPage('/confirmation/mail/' . $code->confirmation_code . 'FAILED');

$I->seeElement('#submit-mail-code');
$I->dontSeeRecord('users', ['id' => 1, 'mail_confirmed' => 1]);
