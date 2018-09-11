<?php
/**
 * Created by PhpStorm.
 * User: Hardman
 * Date: 16.08.2018
 * Time: 22:50
 */

namespace pradex;


abstract class Registry
{
    protected $values = array();

    public $defaultValue = null;

    protected function __construct()
    {

    }

    public function getValue($name)
    {
        if (isset($this->values[$name])) {
            return $this->values[$name];
        }
        else{
            return $this->defaultValue;
        }
    }

    public function getArrValue($name)
    {
        $nameArr = explode('.', $name);

        $tmp = $this->values;

        foreach ($nameArr as $k){
            if(!isset($tmp[$k])){
                return $this->defaultValue;
            }
            $tmp = $tmp[$k];
        }

        return $tmp;

    }

    public function getValueOrDefault($name, $default)
    {
        if (isset($this->values[$name])) {
            return $this->values[$name];
        }
        else{
            return $default;
        }
    }

    public function getEscapedValue($name)
    {
        return htmlspecialchars($this->getValue($name));
    }

    public function getSlashedValue($name)
    {
        return addslashes($this->getValue($name));
    }

    public function isFound($val)
    {
        return isset($this->values[$val]);
    }
}