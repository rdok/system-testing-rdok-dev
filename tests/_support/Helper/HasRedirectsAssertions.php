<?php

namespace Helper;

trait HasRedirectsAssertions
{
    public function seeResponseIsRedirectedTo($url)
    {
        $this->seeResponseCodeIsRedirection();

        $this->seeHttpHeader('Location', $url);
    }
}