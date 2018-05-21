<?php

namespace Tests\Stubs;

use ByRobots\Validation\AbstractRule;

class AlwaysFails extends AbstractRule
{
    /**
     * @inheritDoc
     */
    protected $name = 'always_fails';

    /**
     * @inheritDoc
     */
    public $messages = [
        'en' => 'is a test',
    ];

    /**
     * @inheritDoc
     */
    public function validate($field, array $input, array $params = null): bool
    {
        return false;
    }
}
