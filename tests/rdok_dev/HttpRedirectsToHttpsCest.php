<?php

namespace rdok_dev;

use Rdok_devTester;

class HttpRedirectsToHttpsCest
{
    public function _before(Rdok_devTester $I)
    {
        $I->stopFollowingRedirects();
    }

    public function nonWwwHttpRedirectsToNonWwwHttps(Rdok_devTester $I)
    {
        $I->wantToTest('non-www http redirects to non-www https.');

        $I->sendGET('http://rdok.dev');

        $I->seeResponseCodeIsRedirection();

        $I->seeHttpHeader('Location', 'https://rdok.dev/');
    }

    public function wwwHttpRedirectsToNonWwwHttps(Rdok_devTester $I)
    {
        $I->wantToTest('www http redirects to non-www https.');

        $I->sendGET('http://www.rdok.dev');

        $I->seeResponseCodeIsRedirection();

        $I->seeHttpHeader('Location', 'https://rdok.dev/');
    }
}
