<?php 
$I = new AcceptanceTester($scenario);

$I->am('an user');
$I->wantTo('upload a cover picture and see it in profile');

//setup
$I->amLoggedAs(\App\User::find(1));
$I->amOnAction('ProfileController@edit');

//test
$I->attachFile(['id'=>'image_profile_wide'], 'dummy.jpg');
$I->click('cropper-submit_wide');



//assert
$I->seeResponseCodeIs(200);
$I->seeCurrentActionIs('ProfileController@edit');