<?php

namespace Tests\Rules;

use ByRobots\Validation\Rules\Present as Rule;
use Tests\TestCase;

class Present extends TestCase
{
    /**
     * When column is present the rule should return true.
     */
    public function testValid()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => 'bar']);
        $this->assertTrue($result);
    }

    /**
     * When column is not present the rule should return false.
     */
    public function testInvalid()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['bar' => 'foo']);
        $this->assertFalse($result);
    }
}
