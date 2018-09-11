<?php
session_start();
# Определить IP пользователя...
function realip(){
       if(!empty($_SERVER['HTTP_CLIENT_IP'])){
         $getrealip = $_SERVER['HTTP_CLIENT_IP'];
       }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
         $getrealip = $_SERVER['HTTP_X_FORWARDED_FOR'];
       }else{
         $getrealip = $_SERVER['REMOTE_ADDR'];
       }
       return $getrealip;
}
# Функция активации главного меню...
function menuact($files) {
    if(strpos($_SERVER['PHP_SELF'], $files) != false) return 'class="active"';  
} 
# Определить страну пользователя... 
function country(){
  require $_SERVER['DOCUMENT_ROOT'].'/country/SxGeo.php';
  $SxGeo = new SxGeo($_SERVER['DOCUMENT_ROOT'].'/country/SxGeoCity.dat');
  $sx_geo = $SxGeo->getCityFull(realip()); 
    foreach($sx_geo as $brand => $massiv){
       foreach($massiv as $inner_key => $value){
	     if($brand == 'country' && $inner_key == 'iso'){$geo_sing = $value;}
	     if($brand == 'country' && $inner_key == 'name_ru'){$geo_name = $value;}
       }
    }
	if($geo_name != ''){
       $geo_sing = strtolower($geo_sing);
       return $geo_sing;
	}else{
	   return false;
	}
}
# Вывод игры с БД
function StartGames($h1, $width, $height){
 $slots = mysql_query("SELECT `id`,`name_en`,`name_ru`,`breeder`,`url_iframe`,`publish`,`casino`,`new`,`played` 
                       FROM `db_games` WHERE `url_sites`='".substr($_SERVER['PHP_SELF'], 0, -4)."' LIMIT 1");
   if($slots){  
	  $relot = mysql_fetch_assoc($slots);
      # Модуль сколько раз играли игру...
      mysql_query("UPDATE `db_games` SET `played`=`played`+'1' WHERE `id`='".$relot['id']."'"); 
      $_SESSION['realcasino'] = '<center>
	                     <a rel="nofollow" class="btn-yellow" href="/link?hall='.$relot['casino'].'" target="_blank">Играть в казино</a>
					   </center>';
	  # Вывод оценки автомата...
      $html = '<h1>'.$h1.'</h1>';
      $html = $html. '<noindex>';
      $html = $html. '<iframe class="iframe" rel="nofollow" src="'.$relot['url_iframe'].'" width="'.$width.'" height="'.$height.'"></iframe>';
      $html = $html. '<div class="gamesif">
	                    <a rel="nofollow" class="btn-yellow" href="/link?hall='.$relot['casino'].'" target="_blank">Играть на деньги</a>
					  </div>';   
      $html = $html. '<div class="played">Сыграно игроками: <b>'.$relot['played'].'</b> раунд(ов)</div>';
      $html = $html. '</noindex>'; 
      return $html;	
   }else{
   return false;   
   }	  
}
# Плагин социальные сети...
function SocialIcon(){
 return '<noindex>
         <script type="text/javascript">(function() {
         if (window.pluso)if (typeof window.pluso.start == "function") return;
         if (window.ifpluso==undefined) { window.ifpluso = 1;
             var d = document, s = d.createElement(\'script\'), g = \'getElementsByTagName\';
             s.type = \'text/javascript\'; s.charset=\'UTF-8\'; s.async = true;
             s.src = (\'https:\' == window.location.protocol ? \'https\' : \'http\')  + \'://share.pluso.ru/pluso-like.js\';
             var h=d[g](\'body\')[0];
             h.appendChild(s);
            }})();</script>
         <center><div style="margin-top: 20px;" class="pluso" data-background="#232323" data-options="big,square,line,horizontal,nocounter,theme=08" data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir,yazakladki,liveinternet" data-url="http://avtomaty-online.biz" data-title="Avtomaty Online" data-description="Самые новые игровые автоматы, теперь доступны каждому и бесплатно в демо режиме."></div></center>
         </noindex>';	
}



?>