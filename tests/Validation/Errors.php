<?php

namespace Tests\Validation;

use ByRobots\Validation\Validation;
use Tests\Stubs\AlwaysFails;
use Tests\Stubs\AlwaysPasses;
use Tests\TestCase;

class Errors extends TestCase
{
    /**
     * Errors should be available after a failed validation.
     */
    public function testErrorsAvailable()
    {
        $validation = new Validation;

        $validation->addRule(new AlwaysFails);
        $validation->validate(['foo' => 'bar'], ['foo' => ['always_fails']]);

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

        $validation->addRule(new AlwaysPasses);
        $validation->validate(['foo' => 'bar'], ['foo' => ['always_passes']]);

        $this->assertFalse($validation->errors());
    }
}
