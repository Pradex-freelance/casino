<?php
/**
 * Created by PhpStorm.
 * User: Hardman
 * Date: 19.08.2018
 * Time: 16:28
 */

namespace pradex;


use pradex\commands\DefaultCommand;

class CommandResolver
{
    public static function getCommand($request)
    {
        if (!isset($request['action'])){
            return new DefaultCommand();
        }

        if ($request['action'] == 'get_games_ajax'){
            return new commands\GetGamesAjaxCommand();
        }
        if($request['action']=='QuickUpload'){
            return new commands\QuickUploadCommand();
        }
        else {
            return new commands\DefaultCommand();
        }
    }
}