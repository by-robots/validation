<?php

namespace ByRobots\Validation\Rules;

use ByRobots\Validation\AbstractRule;

class FloatType extends AbstractRule
{
    /**
     * @inheritDoc
     */
    protected $name = 'is_float';

    /**
     * @inheritDoc
     */
    public function validate($field, array $input, array $params = null): bool
    {
        return is_float($input[$field]);
    }
}
