<?php

namespace Engine\Core\Validation\Rules\Core;

use Engine\Core\Validation\Rules\AbstractComparisonRule;

/**
 * Less than or equal validation rule.
 *
 * @package Engine\Core\Validation\Rules\Core
 */
class LessThanOrEqual extends AbstractComparisonRule
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
        return $input <= $this->value;
    }
}
