<?php require_once 'blocks/header.php'; ?>
<script type="text/javascript">
function gofilter(mode) {
    setCookie("gofilter",mode,"Mon, 01-Jan-2020 00:00:00 GMT");
    window.location.reload();
    return false;
}

function setCookie (name, value, expires, path, domain, secure) {
    document.cookie = name + "=" + escape(value) +
    ((expires) ? "; expires=" + expires : "") +
    ((path) ? "; path=" + path : "") +
    ((domain) ? "; domain=" + domain : "") +
    ((secure) ? "; secure" : "");
}
</script>
<?php
 # Добавить новый слот 	
 if(isset($_GET['addgames']) && $_GET['addgames'] == 'new'){
 # Добавим игру в базу данных
   if(isset($_POST['breeder'])){
   $breeder = $_POST['breeder']; 
   $name_en = mysql_real_escape_string($_POST['name_en']); 
   $name_ru = mysql_real_escape_string($_POST['name_ru']); 
   $url_images = mysql_real_escape_string($_POST['url_images']); 
   $url_iframe = mysql_real_escape_string($_POST['url_iframe']); 
   $url_sites = mysql_real_escape_string($_POST['url_sites']); 
   $new = mysql_real_escape_string($_POST['new']); 
   $publish = mysql_real_escape_string($_POST['publish']); 
   $casino = mysql_real_escape_string($_POST['casino']); 
   $nofollow = mysql_real_escape_string($_POST['nofollow']); 
   $cat = mysql_real_escape_string($_POST['cat']); 
      if($breeder != '' && $name_en != '' && $url_images != '' && $url_iframe != '' && $url_sites != '' && $new != '' && $publish != '' && $casino > 0){
       mysql_query("INSERT INTO `db_games` 
       (`breeder`,`name_en`,`name_ru`,`url_images`,`url_iframe`,`url_sites`,`new`,`publish`,`casino`,`nofollow`,`cat`) 
        VALUES ('".$breeder."','".$name_en."','".$name_ru."','".$url_images."','".$url_iframe."','".$url_sites."','".$new."','".$publish."','".$casino."','".$nofollow."','".$cat."')"); 
      echo '<span class="msg-success">Отлично! Новая игра успешно добавлена в базу данных!</span>';
      ?><script type="text/javascript">setTimeout("window.location.replace('games')", 1000);</script><?
      exit;
	  }
   } 
   echo '<h1>Добавить новый игровой автомат</h1>
         Все файлы с играми находятся в директории <b>/slots</b>, так же описание слота добавляется соответственно в самых файлах с названиями игр.<br><br>';   
   ?>
    <form method="POST" action="games?addgames=new" name="gamesnew">
    <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tab">
    <tbody>
     <tr align="center">
	   <td class="rt">Значение</td>
       <td class="rt" style="width: 45%;">Описание</td>
     </tr>
     <tr>
	    <td class="lt"><b>Производитель ПО</b></td>
        <td class="lt">
		  <select style="width: 97%;" name="breeder">
          <option value="1">Igrosoft</option>
          <option value="2">Belatra</option>
          <option value="3">Duomatic</option>
          <option value="4">Playson</option>
          <option value="5">Playtech</option>
		  <option value="6">Novomatic</option>
          <option value="7">Microgaming</option>
          <option value="8">Betsoft</option>
          <option value="9">Netent</option>
          <option value="10">Megajack</option>
          <option value="20">Roulette</option>
          <option value="21">Блэкджек</option>
          </select>
		</td> 
     </tr>
     <tr>
	   <td class="lt"><b>Укажите название игры</b><br>на английском языке</td>
       <td class="lt"><input type="text" value="" name="name_en" maxlength="80" placeholder="Пример: Crazy Monkey"></td>
     </tr>
	 <tr>
	   <td class="lt"><b>Укажите название игры</b><br>на русском языке (Если есть)</td>
       <td class="lt"><input type="text" value="" name="name_ru" maxlength="80" placeholder="Пример: Крейзи Манки"></td>
     </tr>
     <tr>
	   <td class="lt"><b>Укажите путь к изображению игры</b><br></td>
       <td class="lt"><input type="text" value="" name="url_images" maxlength="160" placeholder="Пример: /images/games/crazy-monkey.png"></td>
     </tr>
     <tr>
	   <td class="lt"><b>Укажите URL источника игры</b><br>Данная ссылка будет загружатся через тег Iframe</td>
       <td class="lt"><input type="text" value="" name="url_iframe" maxlength="300" placeholder="Пример: https://promo.gamble2fun.com/slots/"></td>
     </tr>
     <tr>
	   <td class="lt"><b>Укажите URL страницы на игру</b><br></td>
       <td class="lt"><input type="text" value="" name="url_sites" maxlength="160" placeholder="Пример: /slots/igrosoft/crazy-monkey"></td>
     </tr>
     <tr>
	    <td class="lt"><b>Реф.ссылка казино</b><br>Выберете казино на которое будет переправлен пользователь в случаи игры на деньги</td>
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
	    <td class="lt"><b>Выберете категорию</b><br>Укажите категорию к которой принадлежит данная игра</td>
        <td class="lt">
		  <select style="width: 97%;" name="cat">
		  <option value="0">Автоматы</option>
          <option value="1">Рулетка</option>
          <option value="2">Блэкджек</option>
          </select>
		</td>
     </tr>	
     <tr>
	    <td class="lt"><b>Выделить игру</b><br>На сайте будет выделена игра как новая</td>
        <td class="lt">
		  <select style="width: 97%;" name="new">
		  <option value="0">Не выделять</option>
          <option value="1">Да выделить</option>
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
	    <td class="lt"><b>Использование атрибута - Nofollow</b></td>
        <td class="lt">
		  <select style="width: 97%;" name="nofollow">
          <option value="0">Нет</option>
          <option value="1">Да</option>
          </select>
		</td>
     </tr>	 
	 <tr>
	   <td class="lt"></td>
	   <td class="lt"><input class="btn-yellow" type="submit" value="Добавить новую игру"></td>
	 </tr>
    </tbody>
    </table>
    </form>
    <?php 
    }else
	   # Редактировать слот
       if(isset($_GET['editgames']) && $_GET['editgames'] > 0){
         echo '<h1>Внести изменения в параметрах игры</h1>
		       Все файлы с играми находятся в директории <b>/slots</b>, так же описание слота добавляется соответственно в самых файлах с названиями игр.<br><br>';
	     $editgames = intval($_GET['editgames']);
		 if(isset($_POST['breeder'])){
          $breeder = $_POST['breeder']; 
          $name_en = mysql_real_escape_string($_POST['name_en']); 
          $name_ru = mysql_real_escape_string($_POST['name_ru']); 
          $url_images = mysql_real_escape_string($_POST['url_images']); 
          $url_iframe = mysql_real_escape_string($_POST['url_iframe']); 
          $url_sites = mysql_real_escape_string($_POST['url_sites']); 
          $new = mysql_real_escape_string($_POST['new']); 
          $publish = mysql_real_escape_string($_POST['publish']); 
          $casino = mysql_real_escape_string($_POST['casino']); 
          $nofollow = mysql_real_escape_string($_POST['nofollow']); 
          $cat = mysql_real_escape_string($_POST['cat']); 
		  
          if($breeder != '' && $name_en != '' && $url_images != '' && $url_iframe != '' && $url_sites != '' && $new != '' && $publish != '' && $casino != 0){
		  mysql_query("UPDATE `db_games` SET 
		                                `breeder`='".$breeder."',
									    `name_en`='".$name_en."',
									    `name_ru`='".$name_ru."',
									    `url_images`='".$url_images."',
									    `url_iframe`='".$url_iframe."',
									    `url_sites`='".$url_sites."',
									    `new`='".$new."',
									    `publish`='".$publish."',
									    `casino`='".$casino."',
									    `nofollow`='".$nofollow."',
									    `cat`='".$cat."'
		                                 WHERE `id`='".$editgames."' LIMIT 1");
          echo '<span class="msg-success">Изменения прошли успешно...</span>';
          ?><script type="text/javascript">setTimeout("window.location.replace('games')", 1000);</script><?
          exit;
		  }
		 }
		 $jk = mysql_fetch_assoc(mysql_query("SELECT * FROM `db_games` WHERE `id`='$editgames'"));
	?>  
    <form method="POST" action="games?editgames=<?=$editgames;?>" name="gamesnew">
    <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tab">
    <tbody>
     <tr align="center">
	   <td class="rt">Значение</td>
       <td class="rt" style="width: 45%;">Описание</td>
     </tr>
     <tr>
	    <td class="lt"><b>Производитель ПО</b></td>
        <td class="lt">
		  <select style="width: 97%;" name="breeder">
          <option value="1" <?php if($jk['breeder'] == 1) echo 'selected'; ?>>Igrosoft</option>
          <option value="2" <?php if($jk['breeder'] == 2) echo 'selected'; ?>>Belatra</option>
          <option value="3" <?php if($jk['breeder'] == 3) echo 'selected'; ?>>Duomatic</option>
          <option value="4" <?php if($jk['breeder'] == 4) echo 'selected'; ?>>Playson</option>
          <option value="5" <?php if($jk['breeder'] == 5) echo 'selected'; ?>>Playtech</option>
		  <option value="6" <?php if($jk['breeder'] == 6) echo 'selected'; ?>>Novomatic</option>
          <option value="7" <?php if($jk['breeder'] == 7) echo 'selected'; ?>>Microgaming</option>
          <option value="8" <?php if($jk['breeder'] == 8) echo 'selected'; ?>>Betsoft</option>
          <option value="9" <?php if($jk['breeder'] == 9) echo 'selected'; ?>>Netent</option>
          <option value="10" <?php if($jk['breeder'] == 10) echo 'selected'; ?>>Megajack</option>
          <option value="20" <?php if($jk['breeder'] == 20) echo 'selected'; ?>>Roulette</option>
          <option value="21" <?php if($jk['breeder'] == 21) echo 'selected'; ?>>Блэкджек</option>
          </select>
		</td> 
     </tr>
     <tr>
	   <td class="lt"><b>Укажите название игры</b><br>на английском языке</td>
       <td class="lt"><input type="text" value="<?=$jk['name_en'];?>" name="name_en" maxlength="80" placeholder="Пример: Crazy Monkey"></td>
     </tr>
	 <tr>
	   <td class="lt"><b>Укажите название игры</b><br>на русском языке (Если есть)</td>
       <td class="lt"><input type="text" value="<?=$jk['name_ru'];?>" name="name_ru" maxlength="80" placeholder="Пример: Крейзи Манки"></td>
     </tr>
     <tr>
	   <td class="lt"><b>Укажите путь к изображению игры</b><br></td>
       <td class="lt"><input type="text" value="<?=$jk['url_images'];?>" name="url_images" maxlength="160" placeholder="Пример: /images/games/crazy-monkey.png"></td>
     </tr>
     <tr>
	   <td class="lt"><b>Укажите URL источника игры</b><br>Данная ссылка будет загружатся через тег Iframe</td>
       <td class="lt"><input type="text" value="<?=$jk['url_iframe'];?>" name="url_iframe" maxlength="300" placeholder="Пример: https://promo.gamble2fun.com/slots/"></td>
     </tr>
     <tr>
	   <td class="lt"><b>Укажите URL страницы на игру</b><br></td>
       <td class="lt"><input type="text" value="<?=$jk['url_sites'];?>" name="url_sites" maxlength="160" placeholder="Пример: /slots/igrosoft/crazy-monkey"></td>
     </tr>
	 <tr>
	    <td class="lt"><b>Реф.ссылка казино</b><br>Выберете казино на которое будет переправлен пользователь в случаи игры на деньги</td>
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
	    <td class="lt"><b>Выберете категорию</b><br>Укажите категорию к которой принадлежит данная игра</td>
        <td class="lt">
		  <select style="width: 97%;" name="cat">
		  <option value="0" <?php if($jk['cat'] == 0) echo 'selected'; ?>>Автоматы</option>
          <option value="1" <?php if($jk['cat'] == 1) echo 'selected'; ?>>Рулетка</option>
          <option value="2" <?php if($jk['cat'] == 2) echo 'selected'; ?>>Блэкджек</option>
          </select>
		</td>
     </tr>
     <tr>
	    <td class="lt"><b>Выделить игру</b><br>На сайте будет выделена игра как новая</td>
        <td class="lt">
		  <select style="width: 97%;" name="new">
		  <option value="0" <?php if($jk['new'] == 0) echo 'selected'; ?>>Не выделять</option>
          <option value="1" <?php if($jk['new'] == 1) echo 'selected'; ?>>Да выделить</option>
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
	    <td class="lt"><b>Использование атрибута - Nofollow</b></td>
        <td class="lt">
		  <select style="width: 97%;" name="nofollow">
          <option value="0" <?php if($jk['nofollow'] == 0) echo 'selected'; ?>>Нет</option>
          <option value="1" <?php if($jk['nofollow'] == 1) echo 'selected'; ?>>Да</option>
          </select>
		</td>
     </tr>
	 <tr>
	   <td class="lt"></td>
	   <td class="lt"><input class="btn-yellow" type="submit" value="Сохранить изменения"></td>
	 </tr>
    </tbody>
    </table>
    </form>	   
	<?php  
	}else{
	# Удалить автомат 
    if(isset($_GET['del']) && $_GET['del'] > 0){
      $del = intval($_GET['del']);	
      mysql_query("DELETE FROM `db_games` WHERE `id`='".$del."' LIMIT 1");
    }
    if(isset($_COOKIE['gofilter'])) {
      $filter = $_COOKIE['gofilter'];
    }
    if($filter == 1) {$nucoc1 = 2; $zapros = "ORDER BY name_en ASC"; }else
    if($filter == 2) {$nucoc1 = 1; $zapros = "ORDER BY name_en DESC";}else{$nucoc1 = 2;}
    if($filter == 3) {$nucoc2 = 4; $zapros = "ORDER BY url_sites ASC"; }else
    if($filter == 4) {$nucoc2 = 3; $zapros = "ORDER BY url_sites DESC";}else{$nucoc2 = 4;}
    if($filter == 5) {$nucoc3 = 6; $zapros = "ORDER BY breeder ASC"; }else
    if($filter == 6) {$nucoc3 = 5; $zapros = "ORDER BY breeder DESC";}else{$nucoc3 = 6;}
    if($filter == 7) {$nucoc4 = 8; $zapros = "ORDER BY publish ASC"; }else
    if($filter == 8) {$nucoc4 = 7; $zapros = "ORDER BY publish DESC";}else{$nucoc4 = 8;}    	
    echo '<h1>Управления играми проекта</h1>
	      Все файлы с играми находятся в директории <b>/slots</b>, так же описание слота добавляется соответственно в самых файлах с названиями игр.<br><br>
          <a class="btn-yellow" href="?addgames=new">Добавить игру</a>'; 
	# Вывод слотов
    $rslot = mysql_query("SELECT * FROM `db_games` WHERE `id`>'0' $zapros");
	echo '<table width="100%" border="0" cellpadding="0" cellspacing="1" class="tab">
             <tr align="center">
               <td class="rt"></td>
               <td class="rt"><a href="#" onclick="javascript:gofilter('.$nucoc1.');">Название</a></td>
               <td class="rt"><a href="#" onclick="javascript:gofilter('.$nucoc2.');">URL страницы</a></td>
               <td class="rt"><a href="#" onclick="javascript:gofilter('.$nucoc3.');">Производитель</a></td>
               <td class="rt"><a href="#" onclick="javascript:gofilter('.$nucoc4.');">Публикация</a></td>
               <td class="rt">Nofollow</td>
               <td class="rt" colspan="2" width="120">Действия</td>
             </tr>';
    # Выводим автоматы на екран...
	while($ts = mysql_fetch_assoc($rslot)){
        echo '<tr>
               <td class="lt" align="center"><img src="'.$ts['url_images'].'" style="width: 65px; height: 51px; border: 2px solid #f3b300;"></td>
               <td class="lt" align="center" style="font-size: 14px; font-weight: bold; color: #ffb000;">'.$ts['name_en'].'</td>
               <td class="lt" align="center">'.$ts['url_sites'].'</td>
               <td class="lt" align="center">';
			   if($ts['breeder'] == 1) echo 'Igrosoft'; else
			   if($ts['breeder'] == 2) echo 'Belatra'; else
			   if($ts['breeder'] == 3) echo 'Duomatic'; else
			   if($ts['breeder'] == 4) echo 'Playson'; else
			   if($ts['breeder'] == 5) echo 'Playtech'; else
			   if($ts['breeder'] == 6) echo 'Novomatic'; else
			   if($ts['breeder'] == 7) echo 'Microgaming'; else
			   if($ts['breeder'] == 8) echo 'Betsoft'; else
			   if($ts['breeder'] == 9) echo 'Netent'; else
			   if($ts['breeder'] == 10) echo 'Megajack'; else 
			   if($ts['breeder'] == 20) echo 'Roulette'; else 
			   if($ts['breeder'] == 21) echo 'Блэкджек'; 
			   echo '</td>
			   <td class="lt" align="center">';
			   if($ts['publish'] == 0){echo '<b style="color: #13BB00;">Да</b>';}else{echo '<b style="color: #87002c;">Нет</b>';}
			   echo '</td>
			   <td class="lt" align="center">';
			   if($ts['nofollow'] == 1){echo '<b style="color: #13BB00;">Да</b>';}else{echo '<b style="color: #87002c;">Нет</b>';}
			   echo '</td>
               <td class="lt" align="center" style="width: 100px;">
			     <a class="delete" href="?del='.$ts['id'].'" title="Удалить слот"></a>
			     <a class="edit" href="?editgames='.$ts['id'].'" title="Редактировать слот"></a>
	           </td>
             </tr>';	  
	}
}
	
	



 ?>	
<?php require_once 'blocks/footer.php'; ?>