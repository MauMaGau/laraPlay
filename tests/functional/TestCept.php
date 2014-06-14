<?php
$I = new FunctionalTester($scenario);

$I->am('A member');
$I->wantTo('Test login');

$I->amOnPage('/login');
$I->fillField('email', 'david@spookstudio.com');
$I->fillField('password', 'password');
$I->click('Login');
$I->seeCurrentUrlEquals('/message');
