<?php

namespace ByRobots\Validation\Rules;

use ByRobots\Validation\AbstractRule;

class NullType extends AbstractRule
{
    /**
     * @inheritDoc
     */
    protected $name = 'is_null';

    /**
     * @inheritDoc
     */
    public function validate($field, array $input, array $params = null): bool
    {
        return is_null($input[$field]);
    }
}
