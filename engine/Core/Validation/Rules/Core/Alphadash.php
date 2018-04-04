<?php

namespace Engine\Core\Validation\Rules\Core;

use Engine\Core\Validation\Rules\AbstractRule;

/**
 * Validation rule for alphanumeric characters, dashes, and underscores.
 *
 * @package Engine\Core\Validation\Rules\Core
 */
class Alphadash extends AbstractRule
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
        return (bool) preg_match('/^([-a-z0-9_-])+$/i', $input);
    }
}
