<?php

namespace Tests\Rules;

use ByRobots\Validation\Rules\StringBetween as Rule;
use Tests\TestCase;

class StringBetween extends TestCase
{
    /**
     * When the string equals the minimum value validation should pass.
     */
    public function testMinValue()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => 'bar'], ['min' => 3]);
        $this->assertTrue($result);
    }

    /**
     * When the string's length equals the maximum value validation
     * should pass.
     */
    public function testMaxValue()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => 'bar'], ['max' => 3]);
        $this->assertTrue($result);
    }

    /**
     * When the string's length is between the min and max values validation
     * should pass.
     */
    public function testBetween()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => 'bar'], ['min' => 2, 'max' => 4]);
        $this->assertTrue($result);
    }

    /**
     * When the string is too short validation should fail.
     */
    public function testTooShort()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => 'bar'], ['max' => 2]);
        $this->assertFalse($result);
    }
}
