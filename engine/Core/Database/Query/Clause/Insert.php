<?php
namespace Engine\Core\Database\Query\Clause;

use Engine\Core\Database\Query\Clause;

/**
 * A insert query builder
 */
class Insert extends Clause
{
    private $table;
    private $params;
    private $duplicate = false;

    /**
     * Constructor
     *
     * @param string $table The table
     * @param array $params The fields and values
     */
    public function __construct($table, $params)
    {
        $this->table($table);
        $this->set($params);
        parent::__construct();
    }

    /**
     * Set table
     *
     * @param string $table The table
     *
     * @return Insert $this
     */
    public function table($table)
    {
        $this->table  = $table;
        return $this;
    }

    /**
     * Set fields and values
     *
     * @param array $params The fields and values
     *
     * @return Insert $this
     */
    public function set($params)
    {
        $this->params = $params; 
        return $this;
    }

    /**
     * Set conditions
     *
     * @param array $conditions The conditions
     *
     * @return Insert $this
     */
    public function onDuplicate()
    {
        $this->duplicate = true;
        return $this;
    }

    /**
     * Get insert query and binding values
     *
     * @param null $constant
     * @return array $built(query, bindingValues)
     */
    public function build($constant = null)
    {
        $columns = array_keys($this->params);
        $bind    = array_values($this->params);

        $placeHolders = join(", ", array_fill(0, count($columns), "?"));
        $column = join(", ", $columns);
        $query = "INSERT INTO {$this->table} ({$column}) VALUES ({$placeHolders})";

        if ($this->duplicate) {
            $sets = array();
            foreach($columns as $column){
                $sets[] = "{$column} = ?";
            }
            $sets = join(", ", $sets);
            $dupQuery = "ON DUPLICATE KEY UPDATE {$sets}";

            return array(
                $query .' '. $dupQuery,
                array_merge($bind, $bind)
            );
        }

        return array($query, $bind);
    }
}
