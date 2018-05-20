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
    private $input;

    /**
     * Rules to validate $data against.
     *
     * @var array
     */
    private $ruleset;

    /**
     * Used to retrieve messages.
     *
     * @var Language
     */
    private $language;

    /**
     * Will contain errors encountered during validation.
     *
     * @var array
     */
    private $errors = [];

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
        return array_keys($this->rules);
    }

    /**
     * Add input to be validated.
     *
     * @param array $input
     */
    public function setInput(array $input)
    {
        $this->input = $input;
    }

    /**
     * Set the ruleset to validate $this->input against.
     *
     * @param array $ruleset
     */
    public function setRuleset(array $ruleset)
    {
        $this->ruleset = $ruleset;
    }

    /**
     * Validate input.
     *
     * @param array $input
     * @param array $ruleset
     *
     * @return bool
     * @throws \Exception
     */
    public function validate(array $input = null, array $ruleset = null) : bool
    {
        // Set the input and ruleset data if it's been passed here.
        if ($input) {
            $this->setInput($input);
        }

        if ($ruleset) {
            $this->setRuleset($ruleset);
        }

        // Reset any errors that may have been encountered through a previous
        // validation.
        $this->errors = [];

        // Loop through rulesets and validate them
        foreach ($this->ruleset as $field => $rules) {
            foreach ($rules as $rule) {
                if (!$this->rules[$rule]->validate($field, $this->input)) {
                    $this->errors[$field][] = $this->language->get($rule);
                }
            }
        }

        return count($this->errors) < 1 ? true : false;
    }

    /**
     * Get errors. Returns FALSE if no errors are available.
     *
     * @rerurn array|bool
     */
    public function errors()
    {
        return !empty($this->errors) ? $this->errors : false;
    }
}
