<?php

namespace Engine\Core\Validation\Rules\Core;

use Engine\Core\Validation\Rules\AbstractRule;

/**
 * Validation rule for alphanumeric characters.
 *
 * @package Engine\Core\Validation\Rules\Core
 */
class Alphanum extends AbstractRule
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
        return (bool) preg_match('/^([a-z0-9])+$/i', $input);
    }
}
