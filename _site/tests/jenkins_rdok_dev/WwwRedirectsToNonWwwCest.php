<?php

namespace jenkins_rdok_dev;

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

        $I->sendGET('http://www.jenkins.rdok.dev');

        $I->seeResponseCodeIsRedirection();

        $I->seeHttpHeader('Location', 'https://jenkins.rdok.dev/');
    }

    public function wwwHttpsRedirectsToNonWwwHttps(Rdok_devTester $I)
    {
        $I->wantToTest('www https redirects to non-www https.');

        $I->sendGET('https://www.jenkins.rdok.dev');

        $I->seeResponseCodeIsRedirection();

        $I->seeHttpHeader('Location', 'https://jenkins.rdok.dev/');
    }
}

