<?php
try {
    $pathInfo =  pathinfo($_FILES['file']['name']);

    $fPath = DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . strval(time()) . '.' . $pathInfo['extension'];
    if( move_uploaded_file($_FILES['file']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$fPath)) {
        echo $fPath;
    }
    else{
        echo 'something went wrong';
    }
}
catch (\Exception $exception)
{
    echo $exception;
}