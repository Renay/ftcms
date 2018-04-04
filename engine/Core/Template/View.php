<?php

namespace Engine\Core\Template;

use Engine\DI\DI;
use Philo\Blade\Blade;

/**
 * Class View
 *
 * @package Engine\Core\Template
 */
class View
{

    /**
     * @var $name
     * @var $views
     */
    protected $name, $views = '', $blade;

    const VIEWS_PATH = ROOT_DIR. "/resources/views";
    const CACHE_PATH = ROOT_DIR. "/resources/cache";

    /**
     * View constructor.
     */
    private function __construct() {
        $this->blade = new Blade(self::VIEWS_PATH, self::CACHE_PATH);
    }

    /**
     * @param $path
     * @param array $data
     * @return mixed
     */
    public static function make($path, $data = [])
    {
        return (new static)->render($path, $data);
    }

    /**
     * @param $path
     * @param array $data
     * @return $this
     */
    public function render($path, $data = [])
    {
        echo $this->blade->view()->make(
            str_replace('.', '/', $path), array_merge($data, $GLOBALS)
        )->render();

        return $this;
    }
}