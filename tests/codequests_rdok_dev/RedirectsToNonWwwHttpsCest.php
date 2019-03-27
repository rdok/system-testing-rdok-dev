<?php

namespace coderequests_rdok_dev;

use Codeception\Example;
use Codequests_Rdok_DevTester;

class RedirectsToNonWwwHttpsCest
{
    public function _before(Codequests_Rdok_DevTester $I)
    {
        $I->stopFollowingRedirects();
    }

    /**
     * @dataProvider nonWwwHttpCombinationsProvider
     */
    public function RedirectsToNonWwwHttps(Codequests_Rdok_DevTester $I, Example $example)
    {
        $I->wantToTest('code quests redirects to non-www https.');

        $I->sendGET($example['url']);

        $I->seeResponseIsRedirectedTo('https://code-quests.rdok.dev/');
    }

    protected function nonWwwHttpCombinationsProvider()
    {
        return [
            'www http' => ['url' => 'http://www.code-quests.rdok.dev'],
            'www https' => ['url' => 'https://www.code-quests.rdok.dev'],
            'non-www http' => ['url' => 'http://code-quests.rdok.dev'],
        ];
    }
}
