<?php
$I = new FunctionalTester($scenario);

$I->am('an user');
$I->wantTo('Create a new event and see it in events page');

//setup
$I->amLoggedAs(\App\User::find(1));
$I->amOnAction('EventsController@create');

//test
$I->fillField(['name' => 'name'], 'Event-Test3320');
$I->fillField(['name' => 'description'], 'Duis vel nibh at velit scelerisque suscipit. Praesent nonummy mi in odio.');
$I->fillField(['name' => 'start_time'], '01/01/2017 - 20:00');
$I->fillField(['name' => 'end_time'], '10/01/2017 - 10:30');
$I->fillField(['name' => 'location'], 'Toulouse - France');
$I->selectOption('categorie_id', 1);
$I->click('submit-event-create');

//verify
$I->seeCurrentActionIs('EventsController@index');

//assert
$I->seeRecord('events', array(
    'name' => 'Event-Test3320',
    'description' => 'Duis vel nibh at velit scelerisque suscipit. Praesent nonummy mi in odio.',
    'location' => 'Toulouse - France',
    'categorie_id' => '1',
    'user_id' => '1'
));



