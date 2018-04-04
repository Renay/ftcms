<?php

namespace Engine\Core\Database\Query;

use Engine\Core\Database\Query\Clause\Select;
use Engine\Core\Database\Query\Clause\Show;
use Engine\Core\Database\Query\Clause\Sub;
use Engine\Core\Database\Query\Clause\Insert;
use Engine\Core\Database\Query\Clause\Update;
use Engine\Core\Database\Query\Clause\Delete;

/**
 * A query builder factory
 */
class Builder
{
    /**
     * Get select query builder
     *
     * @param array $columns The columns
     *
     * @return Select $select
     */
    public static function select(array $columns = ['*'])
    {
        return new Select((new static)->getTable(), $columns);
    }

    /**
     * Get insert query builder
     *
     * @param array $params The fields and values
     *
     * @return Insert $insert
     */
    public static function insert($params)
    {
        return new Insert((new static)->getTable(), $params);
    }

    /**
     * Get update query builder
     *
     * @param array $params The fields and values
     *
     * @return Update $update
     */
    public static function update($params)
    {
        return new Update((new static)->getTable(), $params);
    }

    /**
     * Get delete query builder
     *
     * @return Delete $delete
     */
    public static function delete()
    {
        return new Delete((new static)->getTable());
    }

    /**
     * @param $table
     * @param $params
     * @return Sub      
     */
    public static function sub($table, $params)
    {
        return new Sub($table, $params);
    }

    /**
     * @param $type
     * @return Show
     */
    public static function show($type)
    {
        return new Show((new static)->getTable(), $type);
    }
}
