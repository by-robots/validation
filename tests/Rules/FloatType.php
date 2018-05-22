<?php

namespace tests\Rules;

use ByRobots\Validation\Rules\FloatType as Rule;
use Tests\TestCase;

class FloatType extends TestCase
{
    /**
     * When column is a float the rule should return true.
     */
    public function testValid()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => 1.1]);
        $this->assertTrue($result);
    }

    /**
     * When the column is not a float it should return false.
     */
    public function testInvalid()
    {
        $rule  = new Rule;
        $types = [
            'array'   => [],
            'boolean' => true,
            'integer' => mt_rand(1000, 9999),
            'null'    => null,
            'object'  => new \stdClass,
            'string'  => $this->faker->sentence,
        ];

        foreach ($types as $type => $value) {
            $result = $rule->validate('foo', ['foo' => $value]);
            $this->assertFalse($result, sprintf('Input of type %s validated successfully.', $type));
        }
    }
}
