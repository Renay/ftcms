<?php

namespace Engine\Core\Validation\Rules\Core;

use Engine\Core\Validation\Rules\AbstractRule;

/**
 * Positive number validation rule.
 *
 * @package Engine\Core\Validation\Rules\Core
 * @author Forbs <xqween01@gmail.com>
 */
class IsPositiveNumber extends AbstractRule
{
    public function isValid($input = null)
    {
        return ($input >= 0);
    }
}