<?php

namespace Engine\Core\Validation\Rules\Core;

use Engine\Core\Validation\Rules\AbstractRule;

/**
 * Class IsInteger
 * @package Engine\Core\Validation\Rules\Core
 * @author maximkou <xqween01@gmail.com>
 */
class IsInteger extends AbstractRule
{
    public function isValid($input = null)
    {
        return (is_int($input));
    }
}