<?php
$I = new FunctionalTester($scenario);

$I->am('an user');
$I->wantTo('Create a new carpooling and see it in events page and carpooling page');

//setup
$I->amLoggedAs(\App\User::find(1));
$I->amOnAction('CarpoolingsController@create');

//test
$event_id = $I->grabTextFrom('//select[@id="event_id"]/option/@value');
$I->fillField(['name' => 'description'], 'Duis vel nibh at velit scelerisque suscipit Nunc nulla.');
$I->fillField(['name' => 'start_time'], '01/01/2017 - 20:00');
$I->fillField(['name' => 'location'], 'Bordeaux - France #TEST');
$I->fillField(['name' => 'price'], '10');
$I->fillField(['name' => 'seats'], '4');
$I->fillField(['name' => 'stopovers'], 'Albi, France |  Montauban, France |   Toulouse, France');
$I->click('submit-carpooling-create');

//verify
$I->seeCurrentActionIs('CarpoolingsController@index');

//assert
$I->seeRecord('carpoolings', array(
    'description' => 'Duis vel nibh at velit scelerisque suscipit Nunc nulla.',
    'price' => '10.00',
    'seats' => '4',
    'user_id' => '1',
    'event_id' => $event_id
));

//assert
$I->seeRecord('stopovers', array('location' => 'Albi, France'));
$I->seeRecord('stopovers', array('location' => 'Montauban, France'));
$I->seeRecord('stopovers', array('location' => 'Toulouse, France'));

