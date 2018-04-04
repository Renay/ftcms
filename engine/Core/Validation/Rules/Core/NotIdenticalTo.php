<?php

namespace Engine\Core\Validation\Rules\Core;

use Engine\Core\Validation\Rules\AbstractComparisonRule;

/**
 * Not identical to validation rule.
 *
 * @package Engine\Core\Validation\Rules\Core
 */
class NotIdenticalTo extends AbstractComparisonRule
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
        return $input !== $this->value;
    }
}
