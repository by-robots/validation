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

        $this->assertTrue(in_array('is_string', $available));
        $this->assertTrue(in_array('not_empty', $available));
        $this->assertTrue(in_array('present', $available));
        $this->assertTrue(in_array('string_between', $available));
        $this->assertTrue(in_array('valid_email', $available));
    }
}
