<?php

$server =   'localhost';
$user =     '';
$password = '';
$database = '';

$errbase = '<div style="font: 12px tahoma, arial, sans-serif; color: #276F8F; line-height: 1.3; margin: 50px; text-align: left;">        
            <span style="font-size: 16px; color: #454545;">К сожалению, сервер очень перегружен</span><br />
            Попробуйте обновить страницу или зайдите через минутку.<br />Администраторы делают всё возможное, чтобы снизить нагрузки.<br />Извините за неудобства.

            </div>';
   @$connect = mysql_connect($server, $user, $password) or die($errbase);
   @mysql_select_db($database, $connect);
   @mysql_query('set character_set_client="utf8"');
   @mysql_query('set character_set_results="utf8"');
   @mysql_query('set collation_connection="utf8_general_ci"');

   return array(
       'dsn'        => "mysql:dbname=$database;host=$server",
       'username'   => $user,
       'password'   => $password,
       'options'    => array(

       )
    );
