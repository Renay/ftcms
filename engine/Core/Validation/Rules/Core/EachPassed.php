<?php

namespace Engine\Core\Validation\Rules\Core;

use Engine\Core\Validation\Rules\AbstractRule;
use Engine\Core\Validation\Rules\RuleInterface;

/**
 * Validation rule passing when all the given rules are passing
 *
 * @package Engine\Core\Validation\Rules\Core
 */
class EachPassed extends AbstractRule
{
    /**
     * @var RuleInterface[]
     */
    private $rules;

    /**
     * Validation rule constructor
     *
     * @param RuleInterface[] ...$rules
     */
    public function __construct(RuleInterface ...$rules)
    {
        $this->rules = $rules;
    }

    /**
     * Validates input.
     *
     * @param mixed $input
     *
     * @return bool
     */
    public function isValid($input = null)
    {
        return count($this->getPassedRules($input)) === count($this->rules);
    }

    /**
     * Filters rules and returns only passed ones
     *
     * @param mixed $input
     *
     * @return array|RuleInterface[]
     */
    private function getPassedRules($input)
    {
        return array_filter($this->rules, function (RuleInterface $rule) use ($input) {
            return $rule->isValid($input) === true;
        });
    }
}
