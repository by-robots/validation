<?php

namespace Tests\Validation;

use ByRobots\Validation\Validation;
use Tests\Stubs\AlwaysFails;
use Tests\Stubs\AlwaysPasses;
use Tests\TestCase;

class AddRules extends TestCase
{
    /**
     * A rule should be available after it's added.
     */
    public function testMadeAvailable()
    {
        $alwaysPasses = new AlwaysPasses;
        $alwaysFails  = new AlwaysFails;
        $validation   = new Validation;

        $validation->addRules([$alwaysPasses, $alwaysFails]);

        $available = $validation->available();

        $this->assertTrue(in_array($alwaysPasses->getName(), $available));
        $this->assertTrue(in_array($alwaysFails->getName(), $available));
    }
}
