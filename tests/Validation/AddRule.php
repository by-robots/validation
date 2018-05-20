<?php

namespace Tests\Validation;

use ByRobots\Validation\Validation;
use Tests\Stubs\BlankRule;
use Tests\TestCase;

class AddRule extends TestCase
{
    /**
     * A rule should be available after it's added.
     */
    public function testMadeAvailable()
    {
        $validation = new Validation;
        $rule       = new BlankRule;
        $validation->addRule($rule);

        $available = $validation->available();

        $this->assertTrue(in_array($rule->getName(), $available));
    }

    /**
     * The rule's custom message should be added.
     */
    public function testMessageAdded()
    {
        $validation = new Validation;
        $rule       = new BlankRule;
        $validation->addRule($rule);

        $this->assertEquals(
            'is a test',
            $validation->language->get('blank_rule', 'en')
        );
    }
}
