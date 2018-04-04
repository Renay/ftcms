<?php

namespace Engine\Core\Validation\Rules\Core;

use Engine\Core\Validation\Rules\AbstractRule;

/**
 * Not blank validation rule.
 *
 * @package Engine\Core\Validation\Rules\Core
 */
class NotBlank extends AbstractRule
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
        return $input !== null && $input !== '';
    }
}
