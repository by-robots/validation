<?php

namespace ByRobots\Validation\Rules;

use ByRobots\Validation\AbstractRule;

class StringMin extends AbstractRule
{
    /**
     * @inheritDoc
     */
    protected $name = 'string_min';

    /**
     * @inheritDoc
     */
    public function validate($field, array $input, array $params = null): bool
    {
        $stringLength = strlen($input[$field]);

        if ($stringLength < $params['min']) {
            return false;
        }

        return true;
    }
}
