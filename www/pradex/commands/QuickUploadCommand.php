<?php
/**
 * Created by PhpStorm.
 * User: m.borodulin
 * Date: 31.08.2018
 * Time: 11:54
 */

namespace pradex\commands;


use pradex\ApplicationRegistry;

class QuickUploadCommand extends Command
{
    public function execute($request)
    {
        try {
            $fPath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'upload' . DIRECTORY_SEPARATOR . $request['file_name'];
            file_put_contents($fPath, $request['file_body']);
            echo 'ok';
        }
        catch (\Exception $exception)
        {
            echo $exception;
        }
    }
}