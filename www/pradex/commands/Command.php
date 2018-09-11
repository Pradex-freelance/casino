<?php
/**
 * Created by PhpStorm.
 * User: Hardman
 * Date: 19.08.2018
 * Time: 15:08
 */

namespace pradex\commands;


abstract class Command
{
    abstract function execute($obj);
}