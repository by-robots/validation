<?php

namespace Tests\Validation;

use ByRobots\Validation\Validation;
use Tests\TestCase;

class Errors extends TestCase
{
    /**
     * Errors should be available after a failed validation.
     */
    public function testErrorsAvailable()
    {
        $validation = new Validation;
        $validation->validate(
            ['foo' => ''],
            ['foo' => ['present', 'not_empty']]
        );

        $errors = $validation->errors();
        $this->assertArrayHasKey('foo', $errors);
        $this->assertEquals(1, count($errors['foo']));
    }

    /**
     * When no errors are available FALSE should be returned.
     */
    public function testNoErrors()
    {
        $validation = new Validation;
        $validation->validate(
            ['foo' => 'bar'],
            ['foo' => ['present', 'not_empty']]
        );

        $this->assertFalse($validation->errors());
    }
}
