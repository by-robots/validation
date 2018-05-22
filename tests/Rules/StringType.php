<?php

namespace tests\Rules;

use ByRobots\Validation\Rules\StringType as Rule;
use Tests\TestCase;

class StringType extends TestCase
{
    /**
     * When column is a string the rule should return true.
     */
    public function testValid()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => $this->faker->word]);
        $this->assertTrue($result);
    }

    /**
     * When the column is not a string it should return false.
     */
    public function testInvalid()
    {
        $rule  = new Rule;
        $types = [
            'integer' => mt_rand(1000, 9999),
            'float'   => mt_rand() / mt_getrandmax(),
            'boolean' => true,
            'array'   => [],
            'object'  => new \stdClass,
            'null'    => null,
        ];

        foreach ($types as $type => $value) {
            $result = $rule->validate('foo', ['foo' => $value]);
            $this->assertFalse($result, sprintf('Input of type %s validated successfully.', $type));
        }
    }
}
