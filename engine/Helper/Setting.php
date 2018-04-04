<?php
/**
 * Created by PhpStorm.
 * User: Forbs
 * Date: 14.11.2017
 * Time: 14:25
 */

namespace Engine\Helper;

use App\Models\Settings;

class Setting
{

    /**
     * @return array
     */
    public static function all()
    {
        return Settings::all();
    }

    /**
     * @param $key
     * @return mixed
     */
    public static function get($key)
    {
        return Settings::select(['value'])
            ->where(['key_field' => $key])
            ->first(\PDO::FETCH_OBJ)->value;
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public static function set($key, $value)
    {
        return (new Settings)->set($key, [
            'value' => $value,
        ]);
    }

    /**
     * @param $key
     * @param $name
     * @param $value
     * @return mixed
     */
    public static function add($key, $name, $value)
    {
        return (new Settings)->add(...func_get_args());
    }

}