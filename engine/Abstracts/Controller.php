<?php

namespace Engine\Abstracts;

use Engine\DI\DI;

abstract class Controller
{
    /**
     * @var DI
     */
    protected $di;
    protected $db;
    protected $validator;
    /**
     * Controller constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->initVars();
    }

    /**
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->di->get($key);
    }

    /**
     * @return bool
     */
    public function is_ajax()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
                &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
        ) {
            return true;
        }

        return false;
    }

    /**
     * @return Controller
     */
    public function initVars()
    {
        $vars = array_keys(get_object_vars($this));
        foreach ($vars as $var) {
            if ($this->di->has($var)) {
                $this->{$var} = $this->di->get($var);
            }
        }
        return $this;
    }
}