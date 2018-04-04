<?php

namespace Engine\Core\Database;


use Engine\Core\Database\Query\Builder;

class SingleDB extends Builder
{
    protected static $table;

    public static function table($table)
    {
        self::$table = $table;

        return new self;
    }

    public function getTable()
    {
        return self::$table;
    }

    public function where($condition)
    {
        return parent::select(['*'])->where($condition);
    }
}