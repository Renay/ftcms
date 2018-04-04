<?php
namespace Engine\Core\Config;

class Config
{
    /**
     * Retrieves a group config items.
     *
     * @param $items
     * @return bool
     * @throws \Exception
     */
    public static function get($items)
    {
        $items = explode('.', trim($items));
        $config = self::file($items[0]);
        if (count($items) > 1) {
            unset($items[0]);
            foreach($items as $item) {
                if (isset($config[$item])) {
                    $config = $config[$item];
                }
            }
        }

        return $config;
    }

    /**
     * @param string $config
     * @return bool|mixed
     */
    public static function file($config = 'app')
    {
        $path = sprintf('%s/app/Config/%s.php', ROOT_DIR, $config);
        // Check that the file exists before we attempt to load it.
        if (file_exists($path)) {
            // Get items from the file.
            return require $path;
        }
        // File load unsuccessful.
        return false;
    }
}