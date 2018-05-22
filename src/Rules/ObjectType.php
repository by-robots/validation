<?php

namespace ByRobots\Validation\Rules;

use ByRobots\Validation\AbstractRule;

class ObjectType extends AbstractRule
{
    /**
     * @inheritDoc
     */
    protected $name = 'is_object';

    /**
     * @inheritDoc
     */
    public function validate($field, array $input, array $params = null): bool
    {
        return is_object($input[$field]);
    }
}
