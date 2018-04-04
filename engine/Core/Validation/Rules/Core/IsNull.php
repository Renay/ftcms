<?php

namespace Engine\Core\Validation\Rules\Core;

use Engine\Core\Validation\Rules\AbstractRule;

/**
 * Nullable values validation rule.
 *
 * @package Engine\Core\Validation\Rules\Core
 */
class IsNull extends AbstractRule
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
        return $input === null;
    }
}
