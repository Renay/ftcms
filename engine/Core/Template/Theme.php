<?php

namespace Engine\Core\Template;

class Theme
{
    /**
     * Url current theme
     * @type string
     */
    public $url = '';

    /**
     * @var array $data
     */
    protected static $data = [];

    /**
     * @param string $page
     */
    public function header($page = null)
    {
        $this->load('admin.header', ['page' => $page]);
    }

    /**
     * @param string $page
     */
    public function footer($page = null)
    {
        $this->load('admin.footer', ['page' => $page]);
    }

    /**
     * Load Sidebar
     */
    public function sidebar()
    {
        $this->load('admin.sidebar');
    }

    /**
     * @param $name
     * @param array $data
     */
    public static function block($name, $data = [])
    {
        if (!empty($name)) {
            self::load($name, $data);
        }
    }

    /**
     * @param $nameFile
     * @param array $data
     * @throws \Exception
     */
    public static function load($nameFile, $data = [])
    {
        $templateFile = ROOT_DIR .'/content/views/'. str_replace('.', '/', $nameFile) .'.php';

        if (is_file($templateFile)) {
            extract(array_merge($data, self::$data));
            require $templateFile;
        } else {
            throw new \Exception(
                sprintf("<pre>Views file <b>%s</b> does not exists!</pre>", $templateFile)
            );
        }
    }

    /**
     * @return array
     */
    public function getData()
    {
        return self::$data;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        self::$data = $data;
    }

}