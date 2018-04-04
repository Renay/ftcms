<?php
namespace Engine\Core\Database\Query\Clause;

use Engine\Core\Database\Query\Clause;

/**
 * A delete query builder
 */
class Delete extends Clause
{
    private $table;
    private $where;

    /**
     * Constructor
     *
     * @param string $table The table
     */
    public function __construct($table)
    {
        $this->table($table);
        $this->where = new Condition("WHERE");
        parent::__construct();
    }

    /**
     * Set table
     *
     * @param string $table The table
     *
     * @return Delete|\Engine\Core\Database\Query\Clause\Insert
     */
    public function table($table)
    {
        $this->table = $table; 
        return $this;
    }

    /**
     * Set conditions
     *
     * @param array $conditions The conditions
     *
     * @return Delete|Update
     */
    public function where($conditions)
    {
        $this->where->setConditions($conditions);
        return $this;
    }

    /**
     * Get delete query and binding values
     * @param null $constant
     * @return array $built(query, bindingValues)
     */
    public function build($constant = null)
    {
        $query = "DELETE FROM {$this->table}";
        list($whereQuery, $whereBind) = $this->where->build();
        return array(
            $query . $whereQuery, $whereBind
        );
    }
}
