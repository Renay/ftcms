<?php

namespace App\Models;

use Engine\Abstracts\Model;

class Settings extends Model
{
    /**
     * @param $key
     * @param array $set
     * @return mixed
     */
    public function set($key, array $set)
    {
        return $this::update($set)
            ->where(['key_field' => $key])
            ->send();
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function add($key, $value)
    {
        $this->id = null;
        $this->key_field = $key;
        $this->value = $value;
        return $this->save();
    }
}