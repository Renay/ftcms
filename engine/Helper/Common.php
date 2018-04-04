<?php

namespace Engine\Helper;

class Common
{
    /**
     * @return bool
     */
    public function isPost()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            return true;
        }

        return false;
    }

    /**
     * @return mixed
     */
    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return bool|string
     */
    static function getUrl()
    {
        $pathUrl = $_SERVER['REQUEST_URI'];
        if ($position = strpos($pathUrl, '?')) {
            $pathUrl = substr($pathUrl, 0, $position);
        }
        return $pathUrl;
    }
}