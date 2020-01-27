<?php
$I = new Rdok_devTester($scenario);

$I->wantToTest('https://jenkins.rdok.dev is healthy.');

$I->sendGET('https://jenkins.rdok.dev/login');

$I->seeResponseCodeIs(200);

$I->seeResponseContains('Welcome to Jenkins!');
