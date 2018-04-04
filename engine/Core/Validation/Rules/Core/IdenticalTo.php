<?php

namespace Engine\Core\Validation\Rules\Core;

use Engine\Core\Validation\Rules\AbstractComparisonRule;

/**
 * Identity validation rule.
 *
 * @package Engine\Core\Validation\Rules\Core
 */
class IdenticalTo extends AbstractComparisonRule
{
    /**
     * Validates input.
     *
     * @param mixed $input
     *
     * @return bool
     */
    public function isValid($input = null)
    {
        return $input === $this->value;
    }
}
