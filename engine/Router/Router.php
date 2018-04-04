<?php

namespace Engine\Router;

class Router
{
    private static $routes = [];
    private static $instance;
    private static $namespace;

    private $dispatcher;

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * @param $key
     * @param $pattern
     * @param $controller
     */
    public static function get($key, $pattern, $controller)
    {
        self::getInstance()->addRoute('GET', $key, $pattern, $controller);
    }

    public static function this()
    {
        return true;
    }

    /**
     * @param $key
     * @param $pattern
     * @param $controller
     */
    public static function post($key, $pattern, $controller)
    {
        self::getInstance()->addRoute('POST', $key, $pattern, $controller);
    }

    public static function group($params, $function = '')
    {
        self::$namespace = $params['namespace'];

        if (is_callable($function)) {
            call_user_func($function);
        }

        return self::$namespace = '';
    }

    public function addRoute($method, $name, $uri, $controller)
    {
        self::$routes[$name] = [
            'pattern' => $uri,
            'method' => $method,
            'controller' =>
                !empty(self::$namespace) ? [
                    $controller, self::$namespace
                ] : $controller
        ];
    }

    /**
     * @param $method
     * @param $uri
     * @return DispatchedRoute
     */
    public function dispatch($method, $uri)
    {
        return $this->getDispatcher()->dispatch($method, $uri);
    }

    /**
     * @return UrlDispatcher
     */
    public function getDispatcher()
    {
        if ($this->dispatcher == null) {
            $this->dispatcher = new UrlDispatcher;

            foreach(self::$routes as $route) {
                $this->dispatcher->register($route['method'], $route['pattern'], $route['controller']);
            }
        }

        return $this->dispatcher;
    }
}