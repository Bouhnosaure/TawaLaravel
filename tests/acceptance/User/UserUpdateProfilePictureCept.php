<?php 
$I = new AcceptanceTester($scenario);

$I->am('an user');
$I->wantTo('upload a profile picture and see it in profile');

//setup
$I->amLoggedAs(\App\User::find(1));
$I->amOnAction('ProfileController@edit');

//test
$I->attachFile(['id'=>'image_profile_min'], 'dummy.jpg');
$I->click('cropper-submit_min');



//assert
$I->seeResponseCodeIs(200);
$I->seeCurrentActionIs('ProfileController@edit');