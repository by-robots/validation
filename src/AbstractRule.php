<?php

namespace ByRobots\Validation;

abstract class AbstractRule
{
    /**
     * The rule's name.
     *
     * @var string
     */
    protected $name;

    /**
     * The rule's messages, specified as [$lang => $string]. Only used
     * when add custom rules.
     *
     * @var array
     */
    protected $messages = [];


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
     * Get the rule's messages.
     *
     * @return array
     */
    public function getMessages() : array
    {
        return $this->messages;
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
