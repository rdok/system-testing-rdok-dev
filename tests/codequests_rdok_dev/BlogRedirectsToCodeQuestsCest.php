<?php

namespace coderequests_rdok_dev;

use Codeception\Example;
use Codequests_Rdok_DevTester;

class BlogRedirectsToCodeQuestsCest
{
    public function _before(Codequests_Rdok_DevTester $I)
    {
        $I->stopFollowingRedirects();
    }

    /**
     * @dataProvider blogUrlsProvider
     */
    public function blogRedirectsToCodeQuests(
        Codequests_Rdok_DevTester $I,
        Example $example
    )
    {
        $I->wantToTest('blog redirects to code-quests.');

        $I->sendGET($example['url']);

        $I->seeResponseIsRedirectedTo('https://code-quests.rdok.dev/');
    }

    protected function blogUrlsProvider()
    {
        return [
            'www http' => ['url' => 'http://www.blog.rdok.dev'],
            'www https' => ['url' => 'https://www.blog.rdok.dev'],
            'non-www http' => ['url' => 'http://blog.rdok.dev'],
            'non-www https' => ['url' => 'https://blog.rdok.dev'],
        ];
    }
}
