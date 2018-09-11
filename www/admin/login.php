<?php
session_start();
if(isset($_SESSION['login'])) {
  header('Refresh: 0; url=index');
  exit;	 
}  
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Авторизация администратора</title>
	<link rel="stylesheet" href="css/style.css">
	<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
<?php
   # Подключаем файл подключения БД...
   require_once $_SERVER['DOCUMENT_ROOT']."/config/db.php";
   if(isset($_POST['login'])) {
	  $login = mysql_escape_string(trim($_POST['login']));
	  $password = mysql_escape_string(trim($_POST['password']));
	  if($login == ''){
		echo 'Вы не указали логин!';  
	  }else{
		if($password == ''){ 
		  echo 'Вы не указали пароль!';  
		}else{
		  # Проверим логин и пароль в бд.
          $sql = mysql_query("SELECT `id` FROM `db_admin` WHERE `login`='".$login."' AND password='".$password."'") or die('Запрос на аутентификацию составлен неверно');
          if(mysql_num_rows($sql) == 0){
              exit('Введены неверные данные! Вход невозможен!');
		  }else{
			  $_SESSION['login'] = 'startadmin';
              header('Refresh: 0; url=index');			  
		  }			  
		}  
	  }  
   }
   
?>
  <form method="post" action="" class="login">
    <p>
      <label for="login">Логин:</label>
      <input type="text" name="login" id="login" value="" placeholder="name@example.com">
    </p>

    <p>
      <label for="password">Пароль:</label>
      <input type="password" name="password" id="password" value="" placeholder="4815162342">
    </p>

    <p class="login-submit">
      <button type="submit" class="login-button">Войти</button>
    </p>

    <p class="forgot-password"><a href="index.html">Забыл пароль?</a></p>
  </form>
</body>
</html>
