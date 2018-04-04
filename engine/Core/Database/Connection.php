<?php

namespace Engine\Core\Database;

use \PDO;

/**
 * Class Connection
 * @package Engine\Core\Database
 */
class Connection
{
    private $link;

    /**
     * Connection constructor.
     * * @param null $config
     *
     */
    public function __construct($config = null)
    {
        $this->connect($config);
    }
    /**
     * @return $this
     */
    private function connect($config)
    {
        if (is_null($config)) {
            $config = config('database');
        }

        $dsn = "mysql:host={$config['db_host']};dbname={$config['db_name']}";
        $this->link = new PDO($dsn, $config['db_user'], $config['db_pass']);
        $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->link->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $this;
    }

    /**
     * @param $sql
     * @param array $values
     * @return mixed
     */
    public function execute($sql, $values = [])
    {
        $sth = $this->link->prepare($sql);
        $sth->execute($values);

        return $this->lastInsertId();
    }

    public function query($sql)
    {
        $sth = $this->link->query($sql);

        if(!$result = $sth->fetchAll()) {
            $result = [];
        }

        return $result;
    }

    /**
     * @param $sql
     * @param array $values
     * @param int $constant
     * @return array
     */
    public function prepare($sql, $values = [], $constant = PDO::FETCH_ASSOC)
    {
        $sth = $this->link->prepare($sql);
        $sth->execute($values);

        if(!$result = $sth->fetchAll($constant)) {
            $result = [];
        }

        return $result;

    }

    public function first($sql, array $values = [], $constant = PDO::FETCH_ASSOC)
    {
        $sth = $this->link->prepare($sql);
        $sth->execute($values);

        if (!$result = $sth->fetch($constant)) {
            $result = [];
        }

        return $result;
    }

    public function lastInsertId()
    {
        return $this->link->lastInsertId();
    }

}
