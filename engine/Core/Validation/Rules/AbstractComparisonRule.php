<?php

namespace Engine\Core\Validation\Rules;

abstract class AbstractComparisonRule extends AbstractRule
{
    /**
     * @var mixed
     */
    protected $value;

    /**
     * AbstractComparisonRule constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }
}
