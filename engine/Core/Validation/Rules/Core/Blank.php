<?php

namespace Engine\Core\Validation\Rules\Core;

use Engine\Core\Validation\Rules\AbstractRule;

/**
 * Blank value validation rule.
 *
 * @package Engine\Core\Validation\Rules\Core
 */
class Blank extends AbstractRule
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
        return $input === null || $input === '';
    }
}
