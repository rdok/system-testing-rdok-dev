<?php
$I = new CodeQuestsTester($scenario);

$I->wantToTest('https://code-quests.rdok.dev is healthy.');

$I->sendGET('https://code-quests.rdok.dev');

$I->seeResponseCodeIs(200);

$I->seeResponseContains('Code Quests');