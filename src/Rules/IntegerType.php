<?php

namespace ByRobots\Validation\Rules;

use ByRobots\Validation\AbstractRule;

class IntegerType extends AbstractRule
{
    /**
     * @inheritDoc
     */
    protected $name = 'is_integer';

    /**
     * @inheritDoc
     */
    public function validate($field, array $input, array $params = null): bool
    {
        return is_integer($input[$field]);
    }
}
