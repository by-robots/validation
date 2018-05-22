<?php

namespace ByRobots\Validation\Rules;

use ByRobots\Validation\AbstractRule;

class StringType extends AbstractRule
{
    /**
     * @inheritDoc
     */
    protected $name = 'is_string';

    /**
     * @inheritDoc
     */
    public function validate($field, array $input, array $params = null): bool
    {
        return is_string($input[$field]);
    }
}
