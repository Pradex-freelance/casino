<?php
session_start();
  if(!isset($_SESSION['login'])) {
	 header('Refresh: 0; url=login');
     exit;	 
  }  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Административная панель управления</title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/main.css" type="text/css">
  <!-- <script type="text/javascript" src="js/jquery-1.4.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
   <body>
   <?php 
   # Подключаем файл подключения БД...
   require_once $_SERVER['DOCUMENT_ROOT']."/config/db.php";
   # Функция активации главного меню...
   function menuact($files) {
     if(strpos($_SERVER['PHP_SELF'], $files) != false) return 'class="active"';  
   }
   ?>
   <!-- Начало an_wrapper -->
   <div id="an_wrapper"> 
      <!-- Начало an_header -->
      <div id="an_header">
        <a id="an_logo" class="an_logo" href="index"></a>
		<!-- Начало nav -->
          <div id="nav">
           <ul>
            <li <?php echo menuact('index.php'); ?>><a href="index"><span>Главная</span></a></li>
            <li <?php echo menuact('plugins.php'); ?>><a href="plugins"><span>Плагины</span></a>
			  <ul>
                <li><a href="top-casino"><span>Топ казино</span></a></li>
                <li><a href="bez-casino"><span>Бездепозиты</span></a></li>
              </ul>    
			</li>			
            <li <?php echo menuact('games.php'); ?>><a href="games"><span>Игры</span></a>      		
			</li>	
            <li <?php echo menuact('link.php'); ?>><a href="link"><span>Реф.Ссылки</span></a></li>
            <li <?php echo menuact('news.php'); ?>><a href="news"><span>Новости</span></a></li>
            </ul>
          </div>
		  <!-- Конец nav -->
      </div>
      <!-- Конец an_header -->  
      <!-- Начало an_content -->
      <div id="an_content">