<!-- Начало gs_sidebar -->
<div id="gs_sidebar">
<?php
      echo '<span class="bl-title">Топовые казино</span>';
      $top = mysql_query("SELECT * FROM `db_top` WHERE `id`>'0' and `publish`='0' order by `priority` asc");
      while($t = mysql_fetch_assoc($top)){
	  echo '<div class="rait-casino"><img alt="Онлайн казино '.$t['name'].'" src="'.$t['url_icon'].'">
              <div class="rait-casino-ops"><div class="rait-casino-name">'.$t['name'].'<br><span>Бонус: '.$t['bonus'].'</span></div>
            </div>
            <div class="rait-casino-btn">
              <a class="btn-mini-yellow" href="/link?hall='.$t['casino'].'" rel="nofollow" target="_blank">Играть</a>
              <a class="btn-mini-gray" href="'.$t['url_obzor'].'">Обзор</a>
            </div>
            </div>';
      }
?>
  <span class="bl-title">Подписка на бонусы</span>
  <form name="followersform" class="followers-form">
    <input type="text" name="name" maxlength="20" value="" placeholder="Как вас зовут?">
    <input type="text" name="email" maxlength="40" value="" placeholder="Укажите ваш Email">
  </form>
  <center>
    <span class="btn-followers-yellow" onclick="javascript:followersval(document);">Подписатся</span>
  </center>
  
</div>
<!-- Конец sidebar -->