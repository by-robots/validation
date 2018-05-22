<?php

namespace tests\Rules;

use ByRobots\Validation\Rules\ArrayType as Rule;
use Tests\TestCase;

class ArrayType extends TestCase
{
    /**
     * When column is an array the rule should return true.
     */
    public function testValid()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => []]);
        $this->assertTrue($result);
    }

    /**
     * When the column is not an array it should return false.
     */
    public function testInvalid()
    {
        $rule  = new Rule;
        $types = [
            'boolean' => true,
            'float'   => mt_rand() / mt_getrandmax(),
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
