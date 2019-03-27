<?php

namespace rdok_dev;

use Rdok_devTester;

class WwwRedirectsToNonWwwCest
{
    public function _before(Rdok_devTester $I)
    {
        $I->stopFollowingRedirects();
    }

    public function wwwHttpRedirectsToNonWwwHttps(Rdok_devTester $I)
    {
        $I->wantToTest('www http redirects to non-www https.');

        $I->sendGET('http://www.rdok.dev');

        $I->seeResponseCodeIsRedirection();

        $I->seeHttpHeader('Location', 'https://rdok.dev/');
    }

    public function wwwHttpsRedirectsToNonWwwHttps(Rdok_devTester $I)
    {
        $I->wantToTest('www https redirects to non-www https.');

        $I->sendGET('https://www.rdok.dev');

        $I->seeResponseCodeIsRedirection();

        $I->seeHttpHeader('Location', 'https://rdok.dev/');
    }
}
