<?php
$I = new Rdok_devTester($scenario);

$I->wantToTest('https://rdok.dev is healthy.');

$I->sendGET('https://rdok.dev/');

$I->seeResponseCodeIs(200);

$I->seeResponseContains('rdok');
