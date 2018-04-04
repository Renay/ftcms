<?php

namespace Engine\Core\Validation\Rules\Core;

use Engine\Core\Validation\Rules\AbstractComparisonRule;

/**
 * Greater than or equal validation rule.
 *
 * @package Engine\Core\Validation\Rules\Core
 */
class GreaterThanOrEqual extends AbstractComparisonRule
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
        return $input >= $this->value;
    }
}
