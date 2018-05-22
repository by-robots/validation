<?php

namespace tests\Rules;

use ByRobots\Validation\Rules\BooleanType as Rule;
use Tests\TestCase;

class BooleanType extends TestCase
{
    /**
     * When column is a boolean the rule should return true.
     */
    public function testValid()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => true]);
        $this->assertTrue($result);

        $result = $rule->validate('foo', ['foo' => false]);
        $this->assertTrue($result);
    }

    /**
     * When the column is not a boolean it should return false.
     */
    public function testInvalid()
    {
        $rule  = new Rule;
        $types = [
            'array'   => [],
            'float'   => mt_rand() / mt_getrandmax(),
            'integer' => mt_rand(),
            'null'    => null,
            'object'  => new \stdClass,
            'string'  => $this->faker->sentence,
        ];

        foreach ($types as $type => $value) {
            $result = $rule->validate('foo', ['foo' => $value]);
            $this->assertFalse($result, sprintf('Input of type %s validated successfully.', $type));
        }
    }

    /**
     * Integer values of 1 or 0 should not validate.
     */
    public function testIntegerRepresentations()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => 1]);
        $this->assertFalse($result);

        $result = $rule->validate('foo', ['foo' => 0]);
        $this->assertFalse($result);
    }
}
