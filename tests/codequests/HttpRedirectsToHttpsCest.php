<?php

class HttpRedirectsToHttpsCest
{
    public function _before(CodequestsTester $I)
    {
        $I->stopFollowingRedirects();
    }

    public function nonWwwHttpRedirectsToNonWwwHttps(CodequestsTester $I)
    {
        $I->wantToTest('non-www http redirects to non-www https.');

        $I->sendGET('http://code-quests.rdok.dev');

        $I->seeResponseCodeIsRedirection();

        $I->seeHttpHeader('Location', 'https://code-quests.rdok.dev/');
    }

    public function wwwHttpRedirectsToNonWwwHttps(CodequestsTester $I)
    {
        $I->wantToTest('www http redirects to non-www https.');

        $I->sendGET('http://www.code-quests.rdok.dev');

        $I->seeResponseCodeIsRedirection();

        $I->seeHttpHeader('Location', 'https://code-quests.rdok.dev/');
    }
}
