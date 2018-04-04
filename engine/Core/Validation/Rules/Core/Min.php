<?php

namespace Engine\Core\Validation\Rules\Core;

use InvalidArgumentException;
use Engine\Core\Validation\Rules\AbstractRule;

/**
 * Validation rule for minimum lenth.
 *
 * @package Engine\Core\Validation\Rules\Core
 * @author Forbs <xqween01@gmail.com>
 */

class Min extends AbstractRule
{
    /**
     * Minimum length.
     *
     * @var int
     */
    protected $min;

    /**
     * Minimum validation rule constructor.
     *
     * @param int $min
     * @throws InvalidArgumentException
     */
    public function __construct($min = null) {
        if ($min === null) {
            throw new InvalidArgumentException('Either option "min" or "max" must be given.');
        }

        $this->min = $min;
    }

    public function isValid($input = null)
    {
        return (strlen($input) >= $this->min);
    }
}