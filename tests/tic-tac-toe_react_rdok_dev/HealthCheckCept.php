<?php
$I = new Rdok_devTester($scenario);

$I->wantToTest('https://tic-tac-toe.react.rdok.dev is healthy.');

$I->sendGET('https://tic-tac-toe.react.rdok.dev/alive.html');

$I->seeResponseCodeIs(200);

$I->seeResponseContains('{heartbeat}');
