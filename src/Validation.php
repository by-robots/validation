<?php

namespace ByRobots\Validation;

use ByRobots\Validation\Rules\NotEmpty;
use ByRobots\Validation\Rules\Present;
use ByRobots\Validation\Rules\StringBetween;

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
    public $language;

    /**
     * Contains the success status of a validation.
     *
     * @var bool
     */
    private $success = null;

    /**
     * Will contain errors encountered during validation.
     *
     * @var array
     */
    private $errors = [];

    /**
     * The language to request messages for.
     *
     * @var string
     */
    private $languageSelection;

    /**
     * Set-up the Validation object.
     *
     * @param string $language The language to use for error messages. Will
     *                         default the en for unavailable languages or
     *                         language entries.
     */
    public function __construct($language = 'en')
    {
        $this->language          = new Language;
        $this->languageSelection = $language;

        $this->loadRules();
    }

    /**
     * Loads core class rules.
     */
    private function loadRules()
    {
        $coreRules = [new NotEmpty, new Present, new StringBetween];
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

            foreach ($rule->getMessages() as $language => $message) {
                $this->language->addMessage($language, $rule->getName(), $message);
            }
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

        // Process the ruleset.
        $this->loopRuleset();

        $this->success = count($this->errors) < 1 ? true : false;
        return $this->success;
    }

    /**
     * Has the validation been successful? TRUE if it has, FALSE if not
     * and NULL if no validation has been run.
     *
     * @return bool|null
     */
    public function success()
    {
        return $this->success;
    }

    /**
     * Get errors. Returns FALSE if no errors are available.
     *
     * @return array|bool
     */
    public function errors()
    {
        return !empty($this->errors) ? $this->errors : false;
    }

    /**
     * Loop through a ruleset and send fields rules to be validated.
     *
     * @throws \Exception
     */
    private function loopRuleset()
    {
        foreach ($this->ruleset as $field => $rules) {
            $this->loopRules($field, $rules);
        }
    }

    /**
     * Loop through a field's rules, validating them one by one.
     *
     * @param string $field
     * @param array  $rules
     *
     * @throws \Exception
     */
    private function loopRules($field, array $rules)
    {
        foreach ($rules as $key => $value) {
            if (is_array($value)) {
                $this->runRule($field, $key, $value);
            } else {
                $this->runRule($field, $value);
            }
        }
    }

    /**
     * Run a validation rule.
     *
     * @param string $field
     * @param string $rule
     * @param array  $params
     *
     * @throws \Exception
     */
    private function runRule($field, $rule, array $params = [])
    {
        if (!$this->rules[$rule]->validate($field, $this->input, $params)) {
            $this->errors[$field][] = $this->language->get($rule, $this->languageSelection, $params);
        }
    }
}
