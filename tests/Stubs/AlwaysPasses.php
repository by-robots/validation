<?php

namespace Tests\Stubs;

use ByRobots\Validation\AbstractRule;

class AlwaysPasses extends AbstractRule
{
    /**
     * @inheritDoc
     */
    protected $name = 'always_passes';

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
        return true;
    }
}
