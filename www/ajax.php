<?php
/**
 * Created by PhpStorm.
 * User: m.borodulin
 * Date: 17.08.2018
 * Time: 16:45
 */

include "bootstrap.php";

$registry = \pradex\ApplicationRegistry::getInstance();
$command = \pradex\CommandResolver::getCommand($registry->getArrValue('request'));
$command->execute(pradex\ApplicationRegistry::getInstance()->getValue('request'));
