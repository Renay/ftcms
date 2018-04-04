<?php
namespace Engine\Core\Database\Query\Clause;

use Engine\Core\Database\Query\Clause;

/**
 * A select query builder
 */
class Show extends Clause
{
    private $table;
    private $type;
    private $joins;
    private $where;
    private $order;
    private $group;
    private $limit;
    private $offset;

    /**
     * Show constructor.
     *
     * @param $table
     * @param $type
     */
    public function __construct($table, $type)
    {
        $this->table($table);
        $this->setType($type);
        $this->joins  = array();
        $this->where  = new Condition("WHERE");
        $this->order  = new OrderBy;
        $this->group  = new GroupBy;
        $this->limit  = new Limit;
        $this->offset = new Offset;
        parent::__construct();
    }

    /**
     * Set table
     *
     * @param string $table The table
     *
     * @return Show $this
     */
    public function table($table)
    {
        $this->table = $table;
        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Set conditions
     *
     * @param array $conditions The conditions
     *
     * @return Show $this
     */
    public function where($conditions)
    {
        $this->where->setConditions($conditions);
        return $this;
    }

    /**
     * Add left join clause
     *
     * @param string $table The table
     * @param array $conditions The conditions
     *
     * @return Show $this
     */
    public function leftJoin($table, $conditions = null)
    {
        $join = new Join();
        $join->leftJoin($table, $conditions);
        $this->joins[] = $join;
        return $this;
    }

    /**
     * Add inner join clause
     *
     * @param string $table The table
     * @param array $conditions The conditions
     *
     * @return Show $this
     */
    public function innerJoin($table, $conditions = null)
    {
        $join = new Join();
        $join->innerJoin($table, $conditions);
        $this->joins[] = $join;
        return $this;
    }

    /**
     * Set order by clause
     *
     * @param array $orders The orders
     *
     * @return Show $this
     */
    public function orderBy($orders)
    {
        $this->order->setOrders($orders);
        return $this;
    }

    /**
     * Set group by clause
     *
     * @param array $groups The groups
     *
     * @return Show $this
     */
    public function groupBy($groups)
    {
        $this->group->setGroups($groups);
        return $this;
    }

    /**
     * Set limit and offset clause
     *
     * @param integer $limit  The limit
     * @param integer $offset The offset
     *
     * @return Show $this
     */
    public function limit($limit, $offset = 0)
    {
        $this->limit->setLimit($limit);
        $this->offset->setOffset($offset);
        return $this;
    }

    /**
     * Get select query and binding values
     * @param int $constant
     * @return array $built(query, bindingValues)
     */
    public function build($constant = \PDO::FETCH_ASSOC)
    {
        $query = "SHOW {$this->type} FROM {$this->table}";

        $bind = array();
        foreach($this->joins as $join){
            list($joinQuery, $joinBind) = $join->build();
            $query .= $joinQuery;
            $bind = array_merge($bind, $joinBind);
        }

        list($whereQuery, $whereBind) = $this->where->build();

        $group = $this->group->build();
        $order = $this->order->build();

        list($limit,  $limitBind)  = $this->limit->build();
        list($offset, $offsetBind) = $this->offset->build();

        return array(
            $query . $whereQuery . $group . $order . $limit . $offset ,
            array_merge($bind, $whereBind, $limitBind, $offsetBind)
        );
    }
}
