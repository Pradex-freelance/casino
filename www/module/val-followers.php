<?php
  header("Content-type: text/txt; charset=UTF-8");
  /*function corrstr($stroka, $len){
    $stroka = htmlspecialchars(stripslashes(strip_tags(trim($stroka))));
    $stroka = str_replace("'", "&rsquo;", $stroka);
    $stroka = str_replace("&quot;", "&rdquo;", $stroka);
    $stroka = str_replace("^", " ", $stroka);
    if (mb_strlen($stroka, 'UTF-8') > $len) {
        $stroka = mb_substr($stroka, 0, $len, 'UTF-8');
    }
    return $stroka;
  }
  function mb_ucfirst($str, $encoding = 'UTF-8'){
    $str = mb_ereg_replace('^[\ ]+', '', $str);
    $str = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding).
           mb_substr($str, 1, mb_strlen($str), $encoding);
    return $str;
  }
  function corremail($stroka) {
    if (mb_strlen($stroka, 'UTF-8') > 40) {
        $stroka = mb_substr($stroka, 0, 40, 'UTF-8');
    }
    $stroka = htmlspecialchars(stripslashes(strip_tags(trim($stroka))));
    $stroka = str_replace("'", " ", $stroka);
    $stroka = mb_strtolower($stroka, 'UTF-8');
    if (mb_stripos($stroka, '@', 0, 'UTF-8')) {return $stroka;}else{return '';}
  }
  function sendtomail($site_mail, $send_mail, $subject, $message) {
    $headers = "Reply-To: ".$send_mail."\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=UTF-8 \r\n";
    $headers .= "Content-Transfer-Encoding: 8bit\r\n";
    $headers .= "From: <".$site_mail."> \r\n";
    if(mail($send_mail, $subject, $message, $headers)) {
	  return true;
	}else{
	  return false;
	}
  }*/
  if(isset($_POST['name']) && isset($_POST['email'])){
	# Подключаем файл подключения БД...
    require_once $_SERVER['DOCUMENT_ROOT']."/config/db.php";
	/*$name = mb_ucfirst(strtolower(corrstr($_POST['name'], 20)));
    $email = corremail($_POST['email']);
    if($name == ''){
     exit('Вы не указали ваше имя!');
    }
    if(strlen($name) < 2){
     exit('Вы указали слишком короткое имя!');
    }*/
   /* if(!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $email)){ 
     exit('Извините, но указан E-Mail адрес некорректно!');
    }  
      $email = mysql_escape_string($email);
      $queem = mysql_query("SELECT COUNT(`id`) FROM `db_followers` WHERE `email`='".$email."'");
      if(mysql_result($queem, 0) > 0){
       exit('Указанный вами E-Mail уже подписан. Попробуйте другой!');
      }*/
  /*$subject = 'Подтверждения подписки - для получения бонусов';
  $message = 'Здравствуйте, <b>'.$name.'</b>.<br />
		      ------------------------------------------------------------------------------<br /> 
			  Ссылка подтверждения подписки: <b><a href="http://'.$_SERVER['HTTP_HOST'].'/?m='.$email.'&s='.md5('ks7sw7gs*-s5'.$email).'">здесь</a></b><br /> 
			  ------------------------------------------------------------------------------<br /> 
              На это письмо не нужно отвечать, С уважением <br /> Администрация проекта avtomaty-online.biz';
  sendtomail('support@avtomaty-online.biz', $email, $subject, $message);*/	 	  
  echo 100;  
  }
  echo $_POST['email'];
?>	