<?php
namespace Engine\Router;

class UrlDispatcher
{
    /**
     * @var array
     */
    private $routes = [
        'GET' => [],
        'POST' => [],
    ];

    /**
     * @param $method
     * @return array
     */
    public function routes($method)
    {
        return $this->routes[$method] ?? [];
    }

    /**
     * @param $method
     * @param $pattern
     * @param $controller
     */
    public function register($method, $pattern, $controller)
    {
        $convert = $this->convertPattern($pattern);
        $this->routes[strtoupper($method)][$convert] = $controller;
    }

    /**
     * @param $params
     * @return mixed
     */
    private function processParam($params)
    {
        foreach ($params as $key => $v)
        {
            if (is_int($key)) {
                unset($params[$key]);
            }
        }

        return $params;
    }

    /**
     * @param $pattern
     * @return mixed
     */
    private function convertPattern($pattern)
    {
        if (strpos($pattern, '{') !== false) {
            $pattern = preg_replace("/\{(\w+)\}/i", "(?<\${1}>[a-zA-Z0-9\.\-_%]+)", $pattern);
        }

        return $pattern;
    }

    /**
     * @param $method
     * @param $uri
     * @return DispatchedRoute
     */
    public function dispatch($method, $uri)
    {
        $routes = $this->routes(strtoupper($method));

        if (array_key_exists($uri, $routes)) {
            return new DispatchedRoute($routes[$uri]);
        }

        return $this->doDispatch($method, $uri);
    }

    /**
     * @param $method
     * @param $uri
     * @return DispatchedRoute
     */
    public function doDispatch($method, $uri)
    {
        foreach($this->routes($method) as $route => $controller) {
            $pattern = "#^{$route}$#s";

            if (preg_match($pattern, $uri, $params)) {
                return new DispatchedRoute($controller, $this->processParam($params));
            }
        }
    }
}