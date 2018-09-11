<?php
/**
 * Created by PhpStorm.
 * User: Hardman
 * Date: 16.08.2018
 * Time: 22:17
 */

namespace pradex;
class CookiesRegistry extends Registry
{
    protected static $instance;

    public static function getInstance()
    {
        if (!isset(self::$instance)){
            self::$instance = new static();
        }
        return self::$instance;
    }
    
    protected function __construct()
    {
        $this->values = $_COOKIE;
    }
}
