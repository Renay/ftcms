<?php

namespace Engine\Abstracts;

use Engine\Core\Database\Query\Builder;

abstract class Model extends Builder
{
    /**
     * @var string
     */
    protected $table;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var string
     */
    protected $keyField = 'id';

    /**
     * @var null
     */
    protected $value;

    public function __construct($id = null)
    {
        $this->value = $id;
        if (is_array($id)) {
            $this->keyField = array_keys($id)[0];
            $this->value = $id[$this->keyField];
        }
    }

    /**
     * @return string
     */
    public function getTable()
    {
        if (!$name = $this->table) {
            $name = strtolower(basename(str_replace('\\', '/', static::class)));

            if ($name{strlen($name) - 1} !== 's') {
                $name .= "s";
            }
        }

        return $this->table = $name;
    }

    /**
     * @param array $condition
     * @return \Engine\Core\Database\Query\Clause\Select
     */
    public static function where(array $condition) {
        return parent::select(['*'])->where($condition);
    }

    /**
     * @param array $condition
     * @return \Engine\Core\Database\Query\Clause\Select
     */
    public static function orderBy(array $condition)
    {
        return parent::select()->orderBy($condition);
    }

    /**
     * @param string $column
     * @return mixed
     */
    public static function count($column = 'id')
    {
        return parent::select(["count({$column}) as count"])->first()['count'];
    }

    /**
     * @param int $constant
     * @return array
     */
    public static function all($constant = \PDO::FETCH_ASSOC)
    {
        return parent::select()->get($constant);
    }

    /**
     * @param null $id
     * @return array
     */
    public static function find($id = null)
    {
        if (is_array($id)) {
            return self::where([array_keys($id)[0] => array_values($id)[0]])->first();
        }

        return self::where(['id' => $id])->first();
    }

    /**
     * @param $name
     * @return mixed
     * @throws \Exception
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        throw new \Exception("Свойство {$name} не найдено!");
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function save()
    {
        if ($this->value === null) {
            return static::insert($this->data)->send();
        }

        static::update($this->data)->where([$this->keyField => $this->value])->send();
    }
}