<?php

namespace Engine\Core\Database\Query;

use Engine\Core\Database\Connection;

abstract class Clause
{

    /**
     * @var object Engine\Core\Database\Connection
     */
    private $query;


    /**
     * Clause constructor.
     */
    public function __construct()
    {
        $this->query = new Connection();
    }

    /**
     * @param int $constant
     * @return array $built(query, bindingValues)
     */
    abstract function build($constant = \PDO::FETCH_ASSOC);

    /**
     * @param int $constant
     * @return array
     */
    public function get($constant = \PDO::FETCH_ASSOC)
    {
        return $this->query->prepare(...$this->build($constant));
    }

    /**
     * @return mixed
     */
    public function send()
    {
        return $this->query->execute(...$this->build());
    }

    /**
     * @param int $constant
     * @return array
     */
    public function first($constant = \PDO::FETCH_ASSOC)
    {
        return $this->query->first(...$this->build($constant));
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return $this->query->execute(...$this->build());
    }
}