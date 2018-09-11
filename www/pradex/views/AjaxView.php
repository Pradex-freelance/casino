<?php
/**
 * Created by PhpStorm.
 * User: Hardman
 * Date: 19.08.2018
 * Time: 17:08
 */

namespace pradex\views;

class AjaxView
{
    public static function view($data = array())
    {
        echo json_encode($data);
    }
}