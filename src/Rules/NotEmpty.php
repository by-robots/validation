<?php

namespace ByRobots\Validation\Rules;

use ByRobots\Validation\AbstractRule;

class NotEmpty extends AbstractRule
{
    /**
     * @inheritDoc
     */
    protected $name = 'not_empty';

    /**
     * @inheritDoc
     */
    public function validate($field, array $input, array $params = null): bool
    {
        return empty($input[$field]) ? false : true;
    }
}
