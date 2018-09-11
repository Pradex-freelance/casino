<?php require_once 'blocks/header.php';
 # Добавить новый слот 	
 if(isset($_GET['addtop']) && $_GET['addtop'] == 'new'){
 # Добавим игру в базу данных
   if(isset($_POST['name'])){
   $name = mysql_real_escape_string($_POST['name']);  
   $bonus = mysql_real_escape_string($_POST['bonus']); 
   $url_icon = mysql_real_escape_string($_POST['url_icon']); 
   $url_obzor = mysql_real_escape_string($_POST['url_obzor']); 
   $priority = mysql_real_escape_string($_POST['priority']); 
   $casino = mysql_real_escape_string($_POST['casino']);  
   $publish = intval($_POST['publish']);  
      if($name != '' && $bonus != '' && $url_icon != '' && $url_obzor != '' && $priority != '' && $casino > 0){
       mysql_query("INSERT INTO `db_top` 
       (`name`,`bonus`,`url_icon`,`url_obzor`,`priority`,`casino`,`publish`) 
        VALUES ('".$name."','".$bonus."','".$url_icon."','".$url_obzor."','".$priority."','".$casino."','".$publish."')"); 
      echo '<span class="msg-success">Отлично! Новое казино добавлено в топ!</span>';
      ?><script type="text/javascript">setTimeout("window.location.replace('top-casino')", 1000);</script><?
      exit;
	  }
   } 
   echo '<h1>Добавить новое казино в топ</h1>';   
   ?>
    <form method="POST" action="top-casino?addtop=new" name="top-casinonew">
    <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tab">
    <tbody>
     <tr align="center">
	   <td class="rt">Значение</td>
       <td class="rt" style="width: 45%;">Описание</td>
     </tr>
     <tr>
	   <td class="lt"><b>Укажите название казино</b><br>на любом языке</td>
       <td class="lt"><input type="text" value="" name="name" maxlength="60" placeholder="Пример: AzartPlay"></td>
     </tr>
	 <tr>
	   <td class="lt"><b>Укажите название игры</b><br>на русском языке (Если есть)</td>
       <td class="lt"><input type="text" value="" name="bonus" maxlength="80" placeholder="Пример: 500$ на первый депозит"></td>
     </tr>
     <tr>
	   <td class="lt"><b>Укажите путь к иконки казино</b><br></td>
       <td class="lt"><input type="text" value="" name="url_icon" maxlength="300" placeholder="Пример: /images/casino-icon/01.png"></td>
     </tr>
     <tr>
	   <td class="lt"><b>Укажите URL обзора казино</b></td>
       <td class="lt"><input type="text" value="" name="url_obzor" maxlength="300" placeholder="Пример: /obzor-kazino-azartplay"></td>
     </tr>
     <tr>
	   <td class="lt"><b>Укажите приоритет в списке</b><br>Чем меньше число тем выше в списке будет казино</td>
       <td class="lt"><input type="text" value="" name="priority" maxlength="160" placeholder="Пример: 5"></td>
     </tr>
     <tr>
	    <td class="lt"><b>Реф.ссылка казино</b><br>Выберете ссылку на онлайн казино</td>
        <td class="lt">
		  <select style="width: 97%;" name="casino">
		    <?php
		    $listcat = '<option value="0" selected>Укажите реф.ссылку казино (Обязательно)</option>';	
            $result = mysql_query("SELECT `id`,`name` FROM `db_link` ORDER BY `id` ASC");
             while ($row = mysql_fetch_assoc($result)) {
              $listcat .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
             }
			echo $listcat;
            ?>			 
          </select>
		</td>
     </tr>	
     <tr>
	    <td class="lt"><b>Опубликовать на сайте</b></td>
        <td class="lt">
		  <select style="width: 97%;" name="publish">
          <option value="0">Да</option>
          <option value="1">Нет</option>
          </select>
		</td>
     </tr>	 
	 <tr>
	   <td class="lt"></td>
	   <td class="lt"><input class="btn-yellow" type="submit" value="Добавить казино в топ"></td>
	 </tr>
    </tbody>
    </table>
    </form>
    <?php 
    }else
	   # Редактировать слот
       if(isset($_GET['edittop']) && $_GET['edittop'] > 0){
         echo '<h1>Внести изменения в топе</h1>';
	     $edittop = intval($_GET['edittop']);
		 if(isset($_POST['name'])){
            $name = mysql_real_escape_string($_POST['name']);  
            $bonus = mysql_real_escape_string($_POST['bonus']); 
            $url_icon = mysql_real_escape_string($_POST['url_icon']); 
            $url_obzor = mysql_real_escape_string($_POST['url_obzor']); 
            $priority = mysql_real_escape_string($_POST['priority']); 
            $casino = mysql_real_escape_string($_POST['casino']);  
            $publish = intval($_POST['publish']);  
          if($name != '' && $bonus != '' && $url_icon != '' && $url_obzor != '' && $priority != '' && $casino > 0){
		  mysql_query("UPDATE `db_top` SET 
		                                `name`='".$name."',
									    `bonus`='".$bonus."',
									    `url_icon`='".$url_icon."',
									    `url_obzor`='".$url_obzor."',
									    `priority`='".$priority."',
									    `casino`='".$casino."',
									    `publish`='".$publish."'
		                                 WHERE `id`='".$edittop."' LIMIT 1");
          echo '<span class="msg-success">Изменения прошли успешно...</span>';
          ?><script type="text/javascript">setTimeout("window.location.replace('top-casino')", 1000);</script><?
          exit;
		  }
		 }
		 $jk = mysql_fetch_assoc(mysql_query("SELECT * FROM `db_top` WHERE `id`='$edittop'"));
	?>  
    <form method="POST" action="top-casino?edittop=<?=$edittop;?>" name="edittop">
    <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tab">
   <tbody>
     <tr align="center">
	   <td class="rt">Значение</td>
       <td class="rt" style="width: 45%;">Описание</td>
     </tr>
     <tr>
	   <td class="lt"><b>Укажите название казино</b><br>на любом языке</td>
       <td class="lt"><input type="text" value="<?=$jk['name'];?>" name="name" maxlength="60" placeholder="Пример: AzartPlay"></td>
     </tr>
	 <tr>
	   <td class="lt"><b>Укажите название игры</b><br>на русском языке (Если есть)</td>
       <td class="lt"><input type="text" value="<?=$jk['bonus'];?>" name="bonus" maxlength="80" placeholder="Пример: 500$ на первый депозит"></td>
     </tr>
     <tr>
	   <td class="lt"><b>Укажите путь к иконки казино</b><br></td>
       <td class="lt"><input type="text" value="<?=$jk['url_icon'];?>" name="url_icon" maxlength="300" placeholder="Пример: /images/casino-icon/01.png"></td>
     </tr>
     <tr>
	   <td class="lt"><b>Укажите URL обзора казино</b></td>
       <td class="lt"><input type="text" value="<?=$jk['url_obzor'];?>" name="url_obzor" maxlength="300" placeholder="Пример: /obzor-kazino-azartplay"></td>
     </tr>
     <tr>
	   <td class="lt"><b>Укажите приоритет в списке</b><br>Чем меньше число тем выше в списке будет казино</td>
       <td class="lt"><input type="text" value="<?=$jk['priority'];?>" name="priority" maxlength="160" placeholder="Пример: 5"></td>
     </tr>
     <tr>
	    <td class="lt"><b>Реф.ссылка казино</b><br>Выберете ссылку на онлайн казино</td>
        <td class="lt">
		  <select style="width: 97%;" name="casino">
		    <?php
		    $listcat = '<option value="0">Укажите реф.ссылку казино (Обязательно)</option>';	
            $result = mysql_query("SELECT `id`,`name` FROM `db_link` ORDER BY `id` ASC");
             while ($row = mysql_fetch_assoc($result)) {
			  if($row['id'] == $jk['casino']) $selected = 'selected'; else $selected = ''; 
              $listcat .= '<option value="'.$row['id'].'" '.$selected.'>'.$row['name'].'</option>';
             }
			echo $listcat;
            ?>			 
          </select>
		</td>
     </tr>	
     <tr>
	    <td class="lt"><b>Опубликовать на сайте</b></td>
        <td class="lt">
		  <select style="width: 97%;" name="publish">
          <option value="0" <?php if($jk['publish'] == 0) echo 'selected'; ?>>Да</option>
          <option value="1" <?php if($jk['publish'] == 1) echo 'selected'; ?>>Нет</option>
          </select>
		</td>
     </tr>	 
	 <tr>
	   <td class="lt"></td>
	   <td class="lt"><input class="btn-yellow" type="submit" value="Добавить казино в топ"></td>
	 </tr>
    </tbody>
    </table>
    </form>
	<?php  
	}else{
	# Удалить автомат 
    if(isset($_GET['del']) && $_GET['del'] > 0){
      $del = intval($_GET['del']);	
      mysql_query("DELETE FROM `db_top` WHERE `id`='".$del."' LIMIT 1");
    } 
    echo '<h1>Управления казино в топе</h1>
	      <br><br>
          <a class="btn-yellow" href="?addtop=new">Добавить в топ</a>'; 
	# Вывод слотов
    $rslot = mysql_query("SELECT * FROM `db_top` WHERE `id`>'0' order by `priority` asc");
	echo '<table width="100%" border="0" cellpadding="0" cellspacing="1" class="tab">
             <tr align="center">
               <td class="rt"></td>
               <td class="rt">Название</td>
               <td class="rt">URL на обзор</td>
               <td class="rt">Бонус</td>
               <td class="rt">Приоритет</td>
               <td class="rt">Публикация</td>
               <td class="rt" colspan="2" width="120">Действия</td>
             </tr>';
    # Выводим автоматы на екран...
	while($ts = mysql_fetch_assoc($rslot)){
        echo '<tr>
               <td class="lt" align="center"><img src="'.$ts['url_icon'].'" style="width: 43px; height: 43px; border: 2px solid #f3b300;"></td>
               <td class="lt" align="center" style="font-size: 14px; font-weight: bold; color: #ffb000;">'.$ts['name'].'</td>
               <td class="lt" align="center">'.$ts['url_obzor'].'</td>
               <td class="lt" align="center">'.$ts['bonus'].'</td>
               <td class="lt" align="center">'.$ts['priority'].'</td>
			   <td class="lt" align="center">';
			   if($ts['publish'] == 0){echo '<b style="color: #13BB00;">Да</b>';}else{echo '<b style="color: #87002c;">Нет</b>';}
			   echo '</td>
               <td class="lt" align="center" style="width: 100px;">
			     <a class="delete" href="?del='.$ts['id'].'" title="Удалить слот"></a>
			     <a class="edit" href="?edittop='.$ts['id'].'" title="Редактировать слот"></a>
	           </td>
             </tr>';	  
	}
}
 ?>	
<?php require_once 'blocks/footer.php'; ?>