<?php

namespace ByRobots\Validation;

abstract class Rule
{
    /**
     * The rule's name.
     *
     * @var string
     */
    protected $name;

    /**
     * Get the rule's name.
     *
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Take input and rule parameters and validate the input.
     *
     * @param string $field  The field name to test.
     * @param array  $input  The input to test again. An array of field => value pairs.
     * @param array  $params Parameters specific to the rule.
     *
     * @return bool
     */
    abstract public function validate($field, array $input, array $params = null) : bool;
}
