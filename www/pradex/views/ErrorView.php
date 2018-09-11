<?php
/**
 * Created by PhpStorm.
 * User: m.borodulin
 * Date: 20.08.2018
 * Time: 17:23
 */

namespace pradex\views;


use pradex\ApplicationRegistry;

class ErrorView
{
    public function view($data = array())
    {
        $root = ApplicationRegistry::getInstance()->getValue('DOCUMENT_ROOT');
        include $root . "blocks". DIRECTORY_SEPARATOR ."header.php";
        include "templates" . DIRECTORY_SEPARATOR . "error.php" ;
        include $root . "blocks". DIRECTORY_SEPARATOR ."footer.php";
    }
}