<?php

namespace jenkins_rdok_dev;

use Jenkins_rdok_devTester;

class HttpRedirectsToHttpsCest
{
    public function _before(Jenkins_rdok_devTester $I)
    {
        $I->stopFollowingRedirects();
    }

    public function nonWwwHttpRedirectsToNonWwwHttps(Jenkins_rdok_devTester $I)
    {
        $I->wantToTest('non-www http redirects to non-www https.');

        $I->sendGET('http://jenkins.rdok.dev');

        $I->seeResponseCodeIsRedirection();

        $I->seeHttpHeader('Location', 'https://jenkins.rdok.dev/');
    }

    public function wwwHttpRedirectsToNonWwwHttps(Jenkins_rdok_devTester $I)
    {
        $I->wantToTest('www http redirects to non-www https.');

        $I->sendGET('http://www.jenkins.rdok.dev');

        $I->seeResponseCodeIsRedirection();

        $I->seeHttpHeader('Location', 'https://jenkins.rdok.dev/');
    }
}
