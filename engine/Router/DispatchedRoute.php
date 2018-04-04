<?php

namespace Engine\Router;


class DispatchedRoute
{
    private $controller;

    /**
     * @var array
     */
    private $parameters;

    /**
     * @var string
     */
    private $namespace;

    /**
     * Default namespace for routes
     */
    const DEFAULT_NAMESPACE = 'App';

    /**
     * DispatchedRoute constructor.
     * @param $controller
     * @param array $parameters
     */
    public function __construct($controller, $parameters = [])
    {
        $this->parameters = $parameters;
        $this->controller = is_array($controller) ? $controller[0] : $controller;
        $this->namespace  = is_array($controller) ? $controller[1] : self::DEFAULT_NAMESPACE;
    }

    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->parameters;
    }
}