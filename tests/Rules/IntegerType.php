<?php

namespace tests\Rules;

use ByRobots\Validation\Rules\IntegerType as Rule;
use Tests\TestCase;

class IntegerType extends TestCase
{
    /**
     * When column is an integer the rule should return true.
     */
    public function testValid()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => 1]);
        $this->assertTrue($result);
    }

    /**
     * When the column is not an integer it should return false.
     */
    public function testInvalid()
    {
        $rule  = new Rule;
        $types = [
            'array'   => [],
            'boolean' => true,
            'float'   => mt_rand() / mt_getrandmax(),
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
