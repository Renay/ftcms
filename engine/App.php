<?php

namespace Engine;

use App\Models\User;
use Engine\Helper\Common;
use Engine\Helper\Cookie;
use Engine\Router\Router;
use InvalidArgumentException;

class App
{
    /**
     * @var object DI
     */
    private $di;

    /**
     * @var object Engine\Routes\Routes
     */
    private $router;

    /**
     * App constructor.
     * @param $di
     */
    public function __construct($di)
    {
        $this->di = $di;
        $this->router = Router::getInstance();
    }

    /**
     * Run boot CMS
     */
    public function run()
    {
        if(!$routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getUrl())) {
            throw new InvalidArgumentException('Ничего не найдено по данному адресу!');
        }

        $this->boot($routerDispatch);
    }

    /**
     * Boot CMS.
     *
     * @param object $routerDispatcher
     * @return bool
     */
    public function boot($routerDispatcher)
    {
        $dispatch = $routerDispatcher->getController();

        if (is_callable($dispatch)) {
            die(call_user_func_array($dispatch, $routerDispatcher->getParams()));
        }

        list($class, $action) = explode('@', $routerDispatcher->getController(), 2);

        $controller = sprintf("\\%s\\Controllers\\%s", $routerDispatcher->getNamespace(), $class);

        call_user_func_array([
            new $controller($this->di), $action
        ], $routerDispatcher->getParams());

        return true;
    }
}