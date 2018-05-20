<?php

namespace Tests;

use ByRobots\Validation\Language as Provider;

class Language extends TestCase
{
    /**
     * The string should be returned when available.
     */
    public function testStringReturned()
    {
        $language = new Provider;
        $entry    = $language->get('present', 'en');

        $this->assertEquals('is not present', $entry);
    }

    /**
     * When no string is available NULL should be returned.
     */
    public function testStringNotAvailable()
    {
        $language = new Provider;
        $entry    = $language->get('present', 'en');

        $this->assertNull($entry);
    }

    /**
     * When no language is specified the default should be returned.
     */
    public function testReturnsDefaultLanguage()
    {
        $language = new Provider;
        $language->setDefault('en');

        $entry = $language->get('present');

        $this->assertEquals('is not present', $entry);
    }

    /**
     * When no key is available in the requested language, but it is in
     * the default language, return that.
     */
    public function testRetrievesDefaultWhenNotFound()
    {
        $language = new Provider;
        $language->setDefault('en');

        $entry = $language->get('present', 'xx');

        $this->assertEquals('is not present', $entry);
    }
}
