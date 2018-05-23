<?php

namespace ByRobots\Validation\Rules;

use ByRobots\Validation\AbstractRule;

class StringMax extends AbstractRule
{
    /**
     * @inheritDoc
     */
    protected $name = 'string_max';

    /**
     * @inheritDoc
     */
    public function validate($field, array $input, array $params = null): bool
    {
        $stringLength = strlen($input[$field]);
        if ($stringLength > $params['max']) {
            return false;
        }

        return true;
    }
}
