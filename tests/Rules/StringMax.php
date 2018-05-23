<?php

namespace Tests\Rules;

use ByRobots\Validation\Rules\StringMax as Rule;
use Tests\TestCase;

class StringMax extends TestCase
{
    /**
     * When the string equals the maximum value validation should pass.
     */
    public function testPassesWhenEqualsMax()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => 'bar'], ['max' => 3]);
        $this->assertTrue($result);
    }

    /**
     * When the string is less than the maximum value it should pass.
     */
    public function testPasses()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => 'bar'], ['max' => 4]);
        $this->assertTrue($result);
    }

    /**
     * When the string's length is more than the maximum value it should fail.
     */
    public function testFails()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => 'bar'], ['max' => 2]);
        $this->assertFalse($result);
    }
}
