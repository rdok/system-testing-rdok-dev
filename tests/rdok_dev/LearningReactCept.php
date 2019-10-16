<?php
$I = new Rdok_devTester($scenario);

$I->wantToTest('https://learning-react.rdok.dev is healthy.');

$I->sendGET('https://learning-react.rdok.dev/alive.html');

$I->seeResponseCodeIs(200);

$I->seeResponseContains('{heartbeat}');
