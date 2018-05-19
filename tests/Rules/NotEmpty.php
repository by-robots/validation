<?php

namespace tests\Rules;

use ByRobots\Validation\Rules\NotEmpty as Rule;
use Tests\TestCase;

class NotEmpty extends TestCase
{
    /**
     * When column is not empty rule returns true.
     */
    public function testValid()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => 'bar']);
        $this->assertTrue($result);
    }

    /**
     * When column is empty returns false.
     */
    public function testInvalid()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => '']);
        $this->assertFalse($result);
    }

    /**
     * When column does not exist returns false.
     */
    public function testNotPresent()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['bar' => 'foo']);
        $this->assertFalse($result);
    }
}
