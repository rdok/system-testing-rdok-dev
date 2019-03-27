<?php

namespace rdok_dev;

use Codeception\Example;
use Jenkins_rdok_devTester;
use Rdok_devTester;

class RedirectsToNonWwwHttpsCest
{
    public function _before(Rdok_devTester $I)
    {
        $I->stopFollowingRedirects();
    }

    /**
     * @dataProvider nonWwwHttpCombinationsProvider
     */
    public function RedirectsToNonWwwHttps(Rdok_devTester $I, Example $example)
    {
        $I->wantToTest('rdok.dev redirects to non-www https.');

        $I->sendGET($example['url']);

        $I->seeResponseIsRedirectedTo('https://rdok.dev/');
    }

    protected function nonWwwHttpCombinationsProvider()
    {
        return [
            'www http' => ['url' => 'http://www.rdok.dev'],
            'www https' => ['url' => 'https://www.rdok.dev'],
            'non-www http' => ['url' => 'http://rdok.dev'],
        ];
    }
}
