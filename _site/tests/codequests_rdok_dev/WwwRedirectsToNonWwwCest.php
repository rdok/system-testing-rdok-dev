<?php

namespace coderequests_rdok_dev;

use CodeQuestsTester;

class WwwRedirectsToNonWwwCest
{
    public function _before(CodeQuestsTester $I)
    {
        $I->stopFollowingRedirects();
    }

    public function wwwHttpRedirectsToNonWwwHttps(CodeQuestsTester $I)
    {
        $I->wantToTest('www http redirects to non-www https.');

        $I->sendGET('http://www.code-quests.rdok.dev');

        $I->seeResponseCodeIsRedirection();

        $I->seeHttpHeader('Location', 'https://code-quests.rdok.dev/');
    }

    public function wwwHttpsRedirectsToNonWwwHttps(CodeQuestsTester $I)
    {
        $I->wantToTest('www https redirects to non-www https.');

        $I->sendGET('https://www.code-quests.rdok.dev');

        $I->seeResponseCodeIsRedirection();

        $I->seeHttpHeader('Location', 'https://code-quests.rdok.dev/');
    }
}
