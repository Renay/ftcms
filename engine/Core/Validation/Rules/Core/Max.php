<?php

namespace Engine\Core\Validation\Rules\Core;

use InvalidArgumentException;
use Engine\Core\Validation\Rules\AbstractRule;

/**
 * Class IsInteger
 * @package Engine\Core\Validation\Rules\Core
 * @author maximkou <xqween01@gmail.com>
 */
class Max extends AbstractRule
{

    private $max;

    /**
     * Maximum validation rule constructor.
     *
     * @param int $max
     * @throws InvalidArgumentException
     */
    public function __construct($max = null) {
        if ($max === null) {
            throw new InvalidArgumentException('Either option "max" must be given.');
        }

        $this->max = $max;
    }

    public function isValid($input = null)
    {
        return (strlen($input) <= $this->max);
    }
}