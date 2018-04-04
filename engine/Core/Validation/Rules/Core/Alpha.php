<?php

namespace Engine\Core\Validation\Rules\Core;

use Engine\Core\Validation\Rules\AbstractRule;

/**
 * Validation rule for latin characters.
 *
 * @package Engine\Core\Validation\Rules\Core
 */
class Alpha extends AbstractRule
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
        return (bool) preg_match('/^([a-z])+$/i', $input);
    }
}
