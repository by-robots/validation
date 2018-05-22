<?php

namespace ByRobots\Validation\Rules;

use ByRobots\Validation\AbstractRule;

class URL extends AbstractRule
{
    /**
     * @inheritDoc
     */
    protected $name = 'valid_url';

    /**
     * @inheritDoc
     */
    public function validate($field, array $input, array $params = null): bool
    {
        return !!filter_var($input[$field], FILTER_VALIDATE_URL);
    }
}
