<?php

namespace tests\Rules;

use ByRobots\Validation\Rules\URL as Rule;
use Tests\TestCase;

class URL extends TestCase
{
    /**
     * When column is a valid URL returns true
     */
    public function testValid()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => $this->faker->url]);
        $this->assertTrue($result);
    }

    /**
     * When the URL has a path the rule should validate.
     */
    public function testValidWithPath()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => $this->faker->url . '/' . $this->faker->slug]);
        $this->assertTrue($result);
    }

    /**
     * When a URL has a query string the rule should validate.
     */
    public function testQueryStringValidates()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => $this->faker->url . '?foo=bar']);
        $this->assertTrue($result);
    }

    /**
     * When column is not a valid URL, returns false.
     */
    public function testInvalid()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => $this->faker->word]);
        $this->assertFalse($result);
    }
}
