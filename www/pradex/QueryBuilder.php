<?php


namespace pradex;


class QueryBuilder
{
    private static $instance;
    private $values = array();
    private $sql = '';

    public static function table($table)
    {
        self::$instance = new self($table);
        return self::$instance;
    }

    private function __construct($table)
    {
        $table = addslashes($table);
        $this->sql = "SELECT * FROM $table";
    }

    public function where($name, $operator, $val)
    {
        $name = addslashes($name);
        array_push($this->values, $val);
        $this->sql .= " WHERE $name $operator ?";
        return $this;
    }


    public function andWhere($name, $operator, $val)
    {
        $name = addslashes($name);
        array_push($this->values, $val);
        $this->sql .= " AND $name $operator ?";
        return $this;
    }

    public function orWhere($name, $operator, $val)
    {
        $name = addslashes($name);
        array_push($this->values, $val);
        $this->sql .= " OR $name $operator ?";
        return $this;
    }

    public function orderBy($val)
    {
        $val = addslashes($val);
        $this->sql .= " ORDER BY $val";
        return $this;
    }

    public function asc()
    {
        $this->sql .= ' ASC';
        return $this;
    }

    public function desc()
    {
        $this->sql .= ' DESC';
        return $this;
    }

    public function limit($num)
    {
        $num = intval($num);
        $this->sql .= " LIMIT $num";
        return $this;
    }

    public function get()
    {
        $pdo = ApplicationRegistry::getInstance()->getPDO();

        $st = $pdo->prepare($this->sql);
        $st->execute($this->values);

        $result = $st->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public  function getSQL()
    {
        return array($this->sql, $this->values);
    }
}