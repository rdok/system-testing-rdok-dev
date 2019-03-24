<?php

class WwwRedirectsToNonWwwCest
{
    public function _before(CodequestsTester $I)
    {
        $I->stopFollowingRedirects();
    }

    public function wwwHttpRedirectsToNonWwwHttps(CodequestsTester $I)
    {
        $I->wantToTest('www http redirects to non-www https.');

        $I->sendGET('http://www.code-quests.rdok.dev');

        $I->seeResponseCodeIsRedirection();

        $I->seeHttpHeader('Location', 'https://code-quests.rdok.dev/');
    }

    public function wwwHttpsRedirectsToNonWwwHttps(CodequestsTester $I)
    {
        $I->wantToTest('www https redirects to non-www https.');

        $I->sendGET('https://www.code-quests.rdok.dev');

        $I->seeResponseCodeIsRedirection();

        $I->seeHttpHeader('Location', 'https://code-quests.rdok.dev/');
    }
}
