<?php require_once 'blocks/header.php'; 
 # Добавить новый слот 	
 if(isset($_GET['addlink']) && $_GET['addlink'] == 'new'){
 # Добавим игру в базу данных
   if(isset($_POST['name'])){
   $name = mysql_real_escape_string($_POST['name']); 
   $link = mysql_real_escape_string($_POST['link']); 
   $link_redirect = mysql_real_escape_string($_POST['link_redirect']); 
   $link_bonus = mysql_real_escape_string($_POST['link_bonus']); 
   $redirect = intval($_POST['redirect']); 
      if($name != '' && $link != '' && $link_redirect != '' && $link_bonus != ''){
       mysql_query("INSERT INTO `db_link` (`name`,`link`,`link_redirect`,`link_bonus`,`redirect`) VALUES ('".$name."','".$link."','".$link_redirect."','".$link_bonus."','".$redirect."')"); 
      echo '<span class="msg-success">Отлично! Новая реф.ссылка успешно добавлена в базу данных!</span>';
      ?><script type="text/javascript">setTimeout("window.location.replace('link')", 2000);</script><?
      exit;
	  }
   } 
   echo '<h1>Добавить реферальскую ссылку</h1>';   
   ?>
    <form method="POST" action="link?addlink=new" name="linknew">
    <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tab">
    <tbody>
     <tr align="center">
	   <td class="rt">Значение</td>
       <td class="rt" style="width: 45%;">Описание</td>
     </tr>
     <tr>
	   <td class="lt"><b>Укажите название реф.ссылки</b></td>
       <td class="lt"><input type="text" value="" name="name" maxlength="60" placeholder="Пример: AzartPlay"></td>
     </tr>
	 <tr>
	   <td class="lt"><b>Реф.Ссылка на главную страницу</b><br>онлайн казино</td>
       <td class="lt"><input type="text" value="" name="link" maxlength="300" placeholder="Пример: Начиная с http://"></td>
     </tr>
	 <tr>
	   <td class="lt"><b>Реф.Ссылка - редирект</b><br>Это ссылка для тех регионов у которых доступ закрыт</td>
       <td class="lt"><input type="text" value="" name="link_redirect" maxlength="300" placeholder="Пример: Начиная с http://"></td>
     </tr>
	 <tr>
	   <td class="lt"><b>Реф.Ссылка - Бонусная</b><br>Это ссылка на бонусную лидинг страницу казино</td>
       <td class="lt"><input type="text" value="" name="link_bonus" maxlength="300" placeholder="Пример: Начиная с http://"></td>
     </tr>
     <tr>
	    <td class="lt"><b>Редирект</b><br>Направить пользователя на другую ссылку - если не доступно казино в его регионе</td>
        <td class="lt">
		  <select style="width: 97%;" name="redirect">
		  <option value="0">Без редиректа</option>
          <option value="1">С редеректом</option>
          </select>
		</td>
     </tr>		 
	 <tr>
	   <td class="lt"></td>
	   <td class="lt"><input class="btn-yellow" type="submit" value="Добавить реф.ссылку"></td>
	 </tr>
    </tbody>
    </table>
    </form>
    <?php 
    }else
	# Редактировать слот
    if(isset($_GET['editlink']) && $_GET['editlink'] > 0){
         echo '<h1>Внести изменения в реф.ссылки</h1>';
	     $editlink = intval($_GET['editlink']);
		 if(isset($_POST['name'])){
           $name = mysql_real_escape_string($_POST['name']); 
           $link = mysql_real_escape_string($_POST['link']); 
           $link_redirect = mysql_real_escape_string($_POST['link_redirect']); 
           $link_bonus = mysql_real_escape_string($_POST['link_bonus']); 
           $redirect = intval($_POST['redirect']);			 
                    mysql_query("UPDATE `db_link` SET 
		                                `name`='".$name."',
									    `link`='".$link."',
									    `link_redirect`='".$link_redirect."',
									    `link_bonus`='".$link_bonus."',
									    `redirect`='".$redirect."'
		                                 WHERE `id`='".$editlink."' LIMIT 1");
          echo '<span class="msg-success">Изменения реф.ссылки прошло успешно...</span>';
          ?><script type="text/javascript">setTimeout("window.location.replace('link')", 2000);</script><?
          exit;
		  }
   $jk = mysql_fetch_assoc(mysql_query("SELECT * FROM `db_link` WHERE `id`='$editlink'"));
   ?>
    <form method="POST" action="link?editlink=<?=$editlink;?>" name="linkedit">
    <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tab">
    <tbody>
     <tr align="center">
	   <td class="rt">Значение</td>
       <td class="rt" style="width: 45%;">Описание</td>
     </tr>
     <tr>
	   <td class="lt"><b>Укажите название реф.ссылки</b></td>
       <td class="lt"><input type="text" value="<?=$jk['name'];?>" name="name" maxlength="60" placeholder="Пример: AzartPlay"></td>
     </tr>
	 <tr>
	   <td class="lt"><b>Реф.Ссылка на главную страницу</b><br>онлайн казино</td>
       <td class="lt"><input type="text" value="<?=$jk['link'];?>" name="link" maxlength="300" placeholder="Пример: Начиная с http://"></td>
     </tr>
	 <tr>
	   <td class="lt"><b>Реф.Ссылка - редирект</b><br>Это ссылка для тех регионов у которых доступ закрыт</td>
       <td class="lt"><input type="text" value="<?=$jk['link_redirect'];?>" name="link_redirect" maxlength="300" placeholder="Пример: Начиная с http://"></td>
     </tr>
	 <tr>
	   <td class="lt"><b>Реф.Ссылка - Бонусная</b><br>Это ссылка на бонусную лидинг страницу казино</td>
       <td class="lt"><input type="text" value="<?=$jk['link_bonus'];?>" name="link_bonus" maxlength="300" placeholder="Пример: Начиная с http://"></td>
     </tr>
     <tr>
	    <td class="lt"><b>Редирект</b><br>Направить пользователя на другую ссылку - если не доступно казино в его регионе</td>
        <td class="lt">
		  <select style="width: 97%;" name="redirect">
		  <option value="0" <?php if($jk['redirect'] == 0) echo 'selected'; ?>>Без редиректа</option>
          <option value="1" <?php if($jk['redirect'] == 1) echo 'selected'; ?>>С редеректом</option>
          </select>
		</td>
     </tr>		 
	 <tr>
	   <td class="lt"></td>
	   <td class="lt"><input class="btn-yellow" type="submit" value="Изменить реф.ссылку"></td>
	 </tr>
    </tbody>
    </table>
    </form>
    <?php
    }else{
	echo '<h1>Мои реф.ссылки вывод списка</h1>';
	echo '<a class="btn-yellow" href="?addlink=new">Добавить реф.ссылку</a><br><br>';
	# Удалить автомат 
    if(isset($_GET['del']) && $_GET['del'] > 0){
      $del = intval($_GET['del']);	
      mysql_query("DELETE FROM `db_link` WHERE `id`='".$del."' LIMIT 1");
    }	
	$rlink = mysql_query("SELECT * FROM `db_link` WHERE `id`>'0'");
	echo '<table width="100%" border="0" cellpadding="0" cellspacing="1" class="tab">
             <tr align="center">
               <td class="rt">ID ссылки</td>
               <td class="rt">Названия реф.ссылки</td>
               <td class="rt">Реф.Ссылка</td>
               <td class="rt">Редерект</td>
               <td class="rt" colspan="2" width="120">Действия</td>
             </tr>';	
	# Выводим автоматы на екран...
	while($link = mysql_fetch_assoc($rlink)){
        echo '<tr>
               <td class="lt" align="center">'.$link['id'].'</td>
               <td class="lt" align="center" style="font-size: 14px; font-weight: bold; color: #ffb000;">'.$link['name'].'</td>
               <td class="lt" align="center"><a target="_blank" href="'.$link['link'].'">'.$link['link'].'</a></td>
			   <td class="lt" align="center">';
			   if($link['redirect'] == 1){echo '<b style="color: #13BB00;">Да</b>';}else{echo '<b style="color: #87002c;">Нет</b>';}
			   echo '</td>
               <td class="lt" align="center" style="width: 100px;">
			     <a class="delete" href="?del='.$link['id'].'" title="Удалить ссылку"></a>
			     <a class="edit" href="?editlink='.$link['id'].'" title="Редактировать ссылку"></a>
	           </td>
             </tr>';	  		
	}
    echo '</table>';
    }	
require_once 'blocks/footer.php'; ?>