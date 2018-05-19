<?php

namespace ByRobots\Validation;

use ByRobots\Validation\Rules\NotEmpty;
use ByRobots\Validation\Rules\Present;

class Validation
{
    /**
     * Contain all of the available rules.
     *
     * @var array
     */
    private $rules;

    /**
     * Set-up the Validation object.
     */
    public function __construct()
    {
        $this->loadRules();
    }

    /**
     * Loads core class rules.
     */
    private function loadRules()
    {
        $coreRules = [new NotEmpty, new Present];
        foreach ($coreRules as $rule) {
            $this->addRule($rule);
        }
    }

    /**
     * Add a rule. If the rule is already set it will not be overridden.
     *
     * @param \ByRobots\Validation\AbstractRule $rule
     */
    public function addRule(AbstractRule $rule)
    {
        if (!isset($this->rules[$rule->getName()])) {
            $this->rules[$rule->getName()] = $rule;
        }
    }

    /**
     * Returns an array of available rules.
     *
     * @return array
     */
    public function available() : array
    {
        $available = [];
        foreach ($this->rules as $name => $rule) {
            $available[] = $name;
        }

        return $available;
    }
}
