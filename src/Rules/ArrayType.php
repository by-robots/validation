<?php

namespace ByRobots\Validation\Rules;

use ByRobots\Validation\AbstractRule;

class ArrayType extends AbstractRule
{
    /**
     * @inheritDoc
     */
    protected $name = 'is_array';

    /**
     * @inheritDoc
     */
    public function validate($field, array $input, array $params = null): bool
    {
        return is_array($input[$field]);
    }
}
