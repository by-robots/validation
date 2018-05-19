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
     * Set the rule's name.
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

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
     * @param mixed $input
     * @param array $params
     *
     * @return bool
     */
    abstract public function validate($input, array $params = null) : bool;
}
