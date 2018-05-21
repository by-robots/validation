<?php

namespace Tests\Validation;

use Tests\Stubs\AlwaysFails;
use Tests\Stubs\AlwaysPasses;
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

        $validation->addRule(new AlwaysPasses);
        $validation->validate(['foo' => 'bar'], ['foo' => ['always_passes']]);

        $this->assertTrue($validation->success());
    }

    /**
     * When validation fails success() should be FALSE.
     */
    public function testUnsuccessful()
    {
        $validation = new Validation;

        $validation->addRule(new AlwaysFails);
        $validation->validate(['foo' => 'bar'], ['foo' => ['always_fails']]);

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
