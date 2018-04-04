<?php

namespace Engine\Core\Validation\Rules\Core;

use Engine\Core\Validation\Rules\AbstractRule;

/**
 * Until first failure validation rule.
 *
 * @package Engine\Core\Validation\Rules\Core
 */
class UntilFirstFailure extends AbstractRule
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
        return true;
    }
}
