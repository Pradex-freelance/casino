<?php

//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

spl_autoload_register(function ($className){
    $path = str_replace ('\\', DIRECTORY_SEPARATOR, $className );
    include $path. '.php';
});

$appRegistry = \pradex\ApplicationRegistry::getInstance();

$dbSettings = require "config".DIRECTORY_SEPARATOR."db.php";
$appRegistry->setValue('dbConfig', $dbSettings);

$pdo = $appRegistry->getPDO();
try {
    $stmt = $pdo->prepare('SELECT * FROM `banners` ORDER BY rand() LIMIT 2');
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $appRegistry->setValue('left-banner-img', $rows[0]['img']);
    $appRegistry->setValue('left-banner-link', $rows[0]['link']);
    $appRegistry->setValue('right-banner-img', $rows[1]['img']);
    $appRegistry->setValue('right-banner-link', $rows[1]['link']);
}
catch (Exception $e){

}
