<?php

namespace jenkins_rdok_dev;

use Codeception\Example;
use Codequests_Rdok_DevTester;
use Jenkins_rdok_devTester;

class RedirectsToNonWwwHttpsCest
{
    public function _before(Jenkins_rdok_devTester $I)
    {
        $I->stopFollowingRedirects();
    }

    /**
     * @dataProvider nonWwwHttpCombinationsProvider
     */
    public function RedirectsToNonWwwHttps(Jenkins_rdok_devTester $I, Example $example)
    {
        $I->wantToTest('jenkins redirects to non-www https.');

        $I->sendGET($example['url']);

        $I->seeResponseIsRedirectedTo('https://jenkins.rdok.dev/');
    }

    protected function nonWwwHttpCombinationsProvider()
    {
        return [
            'www http' => ['url' => 'http://www.jenkins.rdok.dev'],
            'www https' => ['url' => 'https://www.jenkins.rdok.dev'],
            'non-www http' => ['url' => 'http://jenkins.rdok.dev'],
        ];
    }
}
