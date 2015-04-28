<?php 
$I = new AcceptanceTester($scenario);
$I->am('an user');
$I->wantTo('Modify a Carpooling and see it in carpooling page');

//setup
$I->amLoggedAs(\App\User::find(1));
$I->amOnAction('CarpoolingsController@show', ['id' => 1]);

$description = trim($I->grabTextFrom('#carpooling-description'));
$price = trim($I->grabTextFrom('#carpooling-price'));
$seats = trim($I->grabTextFrom('#carpooling-seats'));

//modify
$I->amOnAction('CarpoolingsController@edit', ['id' => 1]);

$I->seeInField(['name' => 'description'], $description);
$I->seeInField(['name' => 'price'], $price);
$I->seeInField(['name' => 'seats'], $seats);

$I->fillField(['name' => 'description'], 'TEST DESCRIPTION 3320');
$I->fillField(['name' => 'price'], '5');
$I->fillField(['name' => 'seats'], '3');

$I->click('submit-carpooling-create');

//assert
$I->see('TEST DESCRIPTION 3320', '#carpooling-description');
$I->see('5', '#carpooling-price');
$I->see('3', '#carpooling-seats');
