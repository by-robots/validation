<?php

namespace tests\Rules;

use ByRobots\Validation\Rules\NullType as Rule;
use Tests\TestCase;

class NullType extends TestCase
{
    /**
     * When column is null the rule should return true.
     */
    public function testValid()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => null]);
        $this->assertTrue($result);
    }

    /**
     * When the column is not null it should return false.
     */
    public function testInvalid()
    {
        $rule  = new Rule;
        $types = [
            'array'   => [],
            'boolean' => true,
            'float'   => mt_rand() / mt_getrandmax(),
            'integer' => mt_rand(1000, 9999),
            'object'  => new \stdClass,
            'string'  => $this->faker->sentence,
        ];

        foreach ($types as $type => $value) {
            $result = $rule->validate('foo', ['foo' => $value]);
            $this->assertFalse($result, sprintf('Input of type %s validated successfully.', $type));
        }
    }

    /**
     * Boolean false and integer 0 should not validate.
     */
    public function testFalseNotNull()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => false]);
        $this->assertFalse($result);

        $result = $rule->validate('foo', ['foo' => 0]);
        $this->assertFalse($result);
    }
}
