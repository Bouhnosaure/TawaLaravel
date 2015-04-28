<?php 
$I = new AcceptanceTester($scenario);

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
$I->fillField(['name' => 'stopovers'], 'Albi, France | Montauban, France | Toulouse, France');
$I->click('submit-carpooling-create');

//assert
$I->seeResponseCodeIs(200);
$I->seeCurrentActionIs('CarpoolingsController@index');
$I->see("#TEST");

$I->amOnAction('EventsController@show',  ['id' => $event_id]);
$I->see("#TEST");

