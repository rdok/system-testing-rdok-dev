<?php

namespace coderequests_rdok_dev;

use CodeQuestsTester;

class HttpRedirectsToHttpsCest
{
    public function _before(CodeQuestsTester $I)
    {
        $I->stopFollowingRedirects();
    }

    public function nonWwwHttpRedirectsToNonWwwHttps(CodeQuestsTester $I)
    {
        $I->wantToTest('non-www http redirects to non-www https.');

        $I->sendGET('http://code-quests.rdok.dev');

        $I->seeResponseCodeIsRedirection();

        $I->seeHttpHeader('Location', 'https://code-quests.rdok.dev/');
    }

    public function wwwHttpRedirectsToNonWwwHttps(CodeQuestsTester $I)
    {
        $I->wantToTest('www http redirects to non-www https.');

        $I->sendGET('http://www.code-quests.rdok.dev');

        $I->seeResponseCodeIsRedirection();

        $I->seeHttpHeader('Location', 'https://code-quests.rdok.dev/');
    }
}
