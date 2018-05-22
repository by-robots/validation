<?php

namespace Tests\Validation;

use ByRobots\Validation\Validation;
use Tests\TestCase;

class Available extends TestCase
{
    /**
     * Test that rules are automatically loaded.
     */
    public function testRulesLoaded()
    {
        $validation = new Validation;
        $available  = $validation->available();

        $this->assertTrue(in_array('is_array', $available));
        $this->assertTrue(in_array('is_boolean', $available));
        $this->assertTrue(in_array('is_float', $available));
        $this->assertTrue(in_array('is_integer', $available));
        $this->assertTrue(in_array('is_null', $available));
        $this->assertTrue(in_array('is_object', $available));
        $this->assertTrue(in_array('is_string', $available));
        $this->assertTrue(in_array('not_empty', $available));
        $this->assertTrue(in_array('present', $available));
        $this->assertTrue(in_array('string_between', $available));
        $this->assertTrue(in_array('valid_email', $available));
        $this->assertTrue(in_array('valid_url', $available));
    }
}
