<?php

namespace tests\Rules;

use ByRobots\Validation\Rules\Email as Rule;
use Tests\TestCase;

class Email extends TestCase
{
    /**
     * When column is a valid email returns true.
     */
    public function testValid()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => $this->faker->email]);
        $this->assertTrue($result);
    }

    /**
     * When column is an invalid email returns false.
     */
    public function testInvalid()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => $this->faker->word]);
        $this->assertFalse($result);
    }
}
