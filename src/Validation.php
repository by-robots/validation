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
     * Data to validate.
     *
     * @var array
     */
    private $data;

    /**
     * Rules to validate $data against.
     *
     * @var array
     */
    private $ruleSet;

    /**
     * Used to retrieve messages.
     *
     * @var Language
     */
    private $language;

    /**
     * Set-up the Validation object.
     *
     * @param string $language The language to use for error messages. Will
     *                         default the en for unavailable languages or
     *                         language entries.
     */
    public function __construct($language = 'en')
    {
        $this->language = new Language($language);
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
