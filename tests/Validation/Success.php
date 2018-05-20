<?php

namespace Tests\Validation;

use Tests\TestCase;
use ByRobots\Validation\Validation;

class Success extends TestCase
{
    /**
     * When validation has been successful success() should be TRUE.
     */
    public function testSuccessful()
    {
        $validation = new Validation;
        $validation->validate(
            ['foo' => 'bar'],
            ['foo' => ['present', 'not_empty']]
        );

        $this->assertTrue($validation->success());
    }

    /**
     * When validation fails success() should be FALSE.
     */
    public function testUnsuccessful()
    {
        $validation = new Validation;
        $validation->validate(
            ['foo' => ''],
            ['foo' => ['present', 'not_empty']]
        );

        $this->assertFalse($validation->success());
    }

    /**
     * When no validation has been run NULL should be returned.
     */
    public function testNothingValidated()
    {
        $validation = new Validation;
        $this->assertNull($validation->success());
    }
}
