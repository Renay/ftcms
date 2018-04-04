<?php

namespace Engine\Service;

use Engine\DI\DI as DI;

abstract class AbstractProvider
{
    /**
     * @var object Engine\DI\DI $di;
     */
    protected $di;

    /**
     * AbstractProvider constructor.
     * @param \Engine\DI\DI $di
     */
    public function __construct(DI $di)
    {
        $this->di = $di;
    }

    /**
     * @return mixed
     */
    abstract function init();

}