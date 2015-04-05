<?php
$I = new AcceptanceTester($scenario);

$I->am('an user');
$I->wantTo('Modify an event and see it in events page');

//setup
$I->amLoggedAs(\App\User::find(1));
$I->amOnAction('EventsController@show', ['id' => 1]);
$text = trim($I->grabTextFrom('#event-description'));

//modify
$I->amOnAction('EventsController@edit', ['id' => 1]);
$I->seeInField(['name' => 'description'], $text);
$I->fillField(['name' => 'description'], 'TEST DESCRIPTION 3320');
$I->click('submit-event-create');

//asset
$text = trim($I->grabTextFrom('#event-description'));
$I->see('TEST DESCRIPTION 3320');

