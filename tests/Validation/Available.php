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
        $validator = new Validation;
        $available = $validator->available();

        $this->assertTrue(in_array('present', $available));
        $this->assertTrue(in_array('not_empty', $available));
    }
}
