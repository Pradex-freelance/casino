<?php
/**
 * Created by PhpStorm.
 * User: Hardman
 * Date: 17.08.2018
 * Time: 0:21
 */

namespace pradex;


class ApplicationRegistry extends Registry
{
    protected static $instance;
    protected $pdo;

    protected function __construct()
    {
        $this->setValue('request', $_REQUEST);
        $this->setValue('post', $_POST);
        $this->setValue('get', $_GET);
    }

    public function getPDO()
    {
        if (!isset($this->pdo)){
            $cfg = $this->getValue('dbConfig');
            $this->pdo = new \PDO(
                $cfg['dsn'],
                $cfg['username'],
                $cfg['password'],
                $cfg['options']
            );
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
       return $this->pdo;
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function setValue($name, $value)
    {
        if ($this->isFound($name)){
            throw new PradexException("Value $name is already found");
        }

        $this->values[$name] = $value;
    }

    public function replaceValue($name, $value)
    {
        $this->values[$name] = $value;
    }
}