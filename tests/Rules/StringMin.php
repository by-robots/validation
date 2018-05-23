<?php

namespace Tests\Rules;

use ByRobots\Validation\Rules\StringMin as Rule;
use Tests\TestCase;

class StringMin extends TestCase
{
    /**
     * When the string equals the minimum value validation should pass.
     */
    public function testPassesWhenEqualsMin()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => 'bar'], ['min' => 3]);
        $this->assertTrue($result);
    }

    /**
     * When the string is greater than the minimum value it should pass.
     */
    public function testPasses()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => 'bar'], ['min' => 2]);
        $this->assertTrue($result);
    }

    /**
     * When the string's length is less than the minimum value it should fail.
     */
    public function testFails()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => 'ba'], ['min' => 3]);
        $this->assertFalse($result);
    }
}
