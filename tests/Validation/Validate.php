<?php

namespace Tests\Validation;

use ByRobots\Validation\Validation;
use Tests\Stubs\AlwaysFails;
use Tests\Stubs\AlwaysPasses;
use Tests\TestCase;

class Validate extends TestCase
{
    /**
     * Data should be validated.
     */
    public function testValidatesValid()
    {
        $validation = new Validation;

        $validation->addRule(new AlwaysPasses);
        $result = $validation->validate(['foo' => 'bar'], ['foo' => ['always_passes']]);

        $this->assertTrue($result);
    }

    /**
     * Invalid data should be marked as such.
     */
    public function testDoesntValidateInvalid()
    {
        $validation = new Validation;

        $validation->addRule(new AlwaysFails);
        $result = $validation->validate(['foo' => 'bar'], ['foo' => ['always_fails']]);

        $this->assertFalse($result);
    }

    /**
     * A second validation isn't broken by the preceeding one.
     */
    public function testSecondValidation()
    {
        $validation = new Validation;

        $validation->addRules([
            new AlwaysFails,
            new AlwaysPasses,
        ]);

        $validation->validate(['foo' => 'bar'], ['foo' => ['always_fails']]);
        $result = $validation->validate(['foo' => 'bar'], ['foo' => ['always_passes']]);

        $this->assertTrue($result);
    }

    /**
     * Any params available should be to the rule for validation.
     */
    public function testParams()
    {
        $validation = new Validation;
        $result     = $validation->validate(
            ['foo' => 'bar'],
            ['foo' => ['string_between' => ['min' => 7, 'max' => 8]]]
        );

        $this->assertFalse($result);
    }
}
