<?php

namespace Tests\Stubs;

use ByRobots\Validation\AbstractRule;

class BlankRule extends AbstractRule
{
    /**
     * @inheritDoc
     */
    protected $name = 'blank_rule';

    /**
     * @inheritDoc
     */
    public function validate($field, array $input, array $params = null): bool
    {
        return mt_rand(0, 1) == 0 ? false : true;
    }
}
