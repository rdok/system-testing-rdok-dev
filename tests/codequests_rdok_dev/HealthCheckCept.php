<?php
$I = new Codequests_Rdok_DevTester($scenario);

$I->wantToTest('https://code-quests.rdok.dev is healthy.');

$I->sendGET('https://code-quests.rdok.dev');

$I->seeResponseCodeIs(200);

$I->seeResponseContains('Code Quests');
