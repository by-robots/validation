<?php

namespace Tests\Validation;

use ByRobots\Validation\Validation;
use Tests\TestCase;

class Validate extends TestCase
{
    /**
     * Data should be validated.
     */
    public function testValidatesValid()
    {
        $validation = new Validation;
        $result     = $validation->validate(
            ['foo' => 'bar'],
            ['foo' => ['present', 'not_empty']]
        );

        $this->assertTrue($result);
    }

    /**
     * Invalid data should be marked as such.
     */
    public function testDoesntValidateInvalid()
    {
        $validation = new Validation;
        $result     = $validation->validate(
            ['foo' => ''],
            ['foo' => ['present', 'not_empty']]
        );

        $this->assertFalse($result);
    }

    /**
     * A second validation isn't broken by the preceeding one.
     */
    public function testSecondValidation()
    {
        $validation = new Validation;
        $validation->validate(
            ['foo' => ''],
            ['foo' => ['present', 'not_empty']]
        );

        $result = $validation->validate(
            ['foo' => 'bar'],
            ['foo' => ['present', 'not_empty']]
        );

        $this->assertTrue($result);
    }
}
