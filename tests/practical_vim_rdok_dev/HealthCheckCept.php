<?php
$I = new Rdok_devTester($scenario);

$I->wantToTest('https://practical-vim.rdok.dev is healthy.');

$I->sendGET('https://practical-vim.rdok.dev/alive.html');

$I->seeResponseCodeIs(200);

$I->seeResponseContains('{heartbeat}');
