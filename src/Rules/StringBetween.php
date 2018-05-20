<?php

namespace ByRobots\Validation\Rules;

use ByRobots\Validation\AbstractRule;

class StringBetween extends AbstractRule
{
    /**
     * @inheritDoc
     */
    protected $name = 'string_between';

    /**
     * @inheritDoc
     */
    public function validate($field, array $input, array $params = null): bool
    {
        $stringLength = strlen($input[$field]);

        if (isset($params['min']) and $stringLength < $params['min']) {
            return false;
        }

        if (isset($params['max']) and $stringLength > $params['max']) {
            return false;
        }

        return true;
    }
}
