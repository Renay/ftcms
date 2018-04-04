<?php

namespace Engine\Core\Template;

class Asset
{
    const CSS_LINK_MASK  = '<link rel="stylesheet" href="%s">';
    const JS_SCRIPT_MASK = '<script src="%s" type="text/javascript"></script>';

    /**
     * @var array
     */
    public static $container = [];

    /**
     * @param $link
     * @param null $filename
     */
    public static function css($link, $filename = null)
    {
        if (is_null($filename)) {
            self::$container['css'][] = [
                'file' => $link
            ];
        } else {
            self::$container[$filename]['css'] = [
                'file' => $link
            ];
        }
    }

    /**
     * @param $link
     * @param null $filename
     */
    public static function js($link, $filename = null)
    {
        if (is_null($filename)) {
            self::$container['js'][] = [
                'file' => $link
            ];
        } else {
            self::$container[$filename]['js'][] = [
                'file' => $link
            ];
        }
    }

    /**
     * @param $extension
     * @param null $filename
     */
    public static function render($extension, $filename = null)
    {
        require_once(ROOT_DIR .'/App/Assets.php');

        if ($listAssets = self::$container[$extension]) {
            $renderMethod = 'render' . ucfirst($extension);
            self::$renderMethod($listAssets);
        }

        if ($list = self::$container[$filename][$extension]) {
            $renderMethod = 'render'. ucfirst($extension);
            self::$renderMethod($list);
        }
    }
    /**
     * @param array $list
     */
    public static function renderJs($list)
    {
        foreach ($list as $item) {
            echo sprintf(
                self::JS_SCRIPT_MASK,
                strpos($item['file'], '//') ? $item['file'] : asset($item['file'])
            );
        }
    }
    /**
     * @param array $list
     */
    public static function renderCss($list)
    {
        foreach ($list as $item) {
            echo sprintf(
                self::CSS_LINK_MASK,
                strpos($item['file'], '//') ? $item['file'] : asset($item['file'])
            );
        }
    }
}