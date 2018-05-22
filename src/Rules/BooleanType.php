<?php

namespace ByRobots\Validation\Rules;

use ByRobots\Validation\AbstractRule;

class BooleanType extends AbstractRule
{
    /**
     * @inheritDoc
     */
    protected $name = 'is_boolean';

    /**
     * @inheritDoc
     */
    public function validate($field, array $input, array $params = null): bool
    {
        return is_bool($input[$field]);
    }
}
