<?php
# Подключаем файл подключения БД...
  require $_SERVER['DOCUMENT_ROOT']."/config/db.php";
  require $_SERVER['DOCUMENT_ROOT']."/config/functions.php";
  if(isset($_GET['hall'])){
  $get_hall = intval($_GET['hall']);  
	$hall = mysql_query("SELECT `link`,`link_redirect`,`redirect` FROM `db_link` WHERE `id`='".$get_hall."' LIMIT 1");  
	if($hall != false){
	  $row = mysql_fetch_assoc($hall);  
	  if($row['redirect'] == 1 && country() == 'ua'){
		header('Location: '.$row['link_redirect']);    
	  }else{
		header('Location: '.$row['link']);  
	  }		
	}else{
	  header("Location: /");	
	}  
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
?>