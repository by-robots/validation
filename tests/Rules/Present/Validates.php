<?php

namespace Tests\Rules\Present;

use ByRobots\Validation\Rules\Present;
use Tests\TestCase;

class Validates extends TestCase
{
    /**
     * When column is present the rule should return true.
     */
    public function testValid()
    {
        $rule   = new Present;
        $result = $rule->validate('foo', ['foo' => 'bar']);
        $this->assertTrue($result);
    }

    /**
     * When column is not present the rule should return false.
     */
    public function testInvalid()
    {
        $rule   = new Present;
        $result = $rule->validate('foo', ['bar' => 'foo']);
        $this->assertFalse($result);
    }
}
