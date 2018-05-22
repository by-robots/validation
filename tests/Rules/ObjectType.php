<?php

namespace tests\Rules;

use ByRobots\Validation\Rules\ObjectType as Rule;
use Tests\TestCase;

class ObjectType extends TestCase
{
    /**
     * When column is an object the rule should return true.
     */
    public function testValid()
    {
        $rule   = new Rule;
        $result = $rule->validate('foo', ['foo' => new \stdClass]);
        $this->assertTrue($result);
    }

    /**
     * When the column is not an object it should return false.
     */
    public function testInvalid()
    {
        $rule  = new Rule;
        $types = [
            'array'   => [],
            'boolean' => true,
            'float'   => mt_rand() / mt_getrandmax(),
            'integer' => mt_rand(1000, 9999),
            'null'    => null,
            'string'  => $this->faker->sentence,
        ];

        foreach ($types as $type => $value) {
            $result = $rule->validate('foo', ['foo' => $value]);
            $this->assertFalse($result, sprintf('Input of type %s validated successfully.', $type));
        }
    }
}
