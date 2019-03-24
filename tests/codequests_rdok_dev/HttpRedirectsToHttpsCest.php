<?php

namespace coderequests_rdok_dev;

use Codequests_Rdok_DevTester;

class HttpRedirectsToHttpsCest
{
    public function _before(Codequests_Rdok_DevTester $I)
    {
        $I->stopFollowingRedirects();
    }

    public function nonWwwHttpRedirectsToNonWwwHttps(Codequests_Rdok_DevTester $I)
    {
        $I->wantToTest('non-www http redirects to non-www https.');

        $I->sendGET('http://code-quests.rdok.dev');

        $I->seeResponseCodeIsRedirection();

        $I->seeHttpHeader('Location', 'https://code-quests.rdok.dev/');
    }

    public function wwwHttpRedirectsToNonWwwHttps(Codequests_Rdok_DevTester $I)
    {
        $I->wantToTest('www http redirects to non-www https.');

        $I->sendGET('http://www.code-quests.rdok.dev');

        $I->seeResponseCodeIsRedirection();

        $I->seeHttpHeader('Location', 'https://code-quests.rdok.dev/');
    }
}
