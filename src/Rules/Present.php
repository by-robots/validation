<?php

namespace ByRobots\Validation\Rules;

use ByRobots\Validation\AbstractRule;

class Present extends AbstractRule
{
    /**
     * @inheritDoc
     */
    protected $name = 'present';

    /**
     * @inheritDoc
     */
    public function validate($field, array $input, array $params = null): bool
    {
        return array_key_exists($field, $input);
    }
}
