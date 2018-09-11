<?php
# Функция определения IP...
function getrealip(){
  if(!empty($_SERVER['HTTP_CLIENT_IP'])){
    $getrealip = $_SERVER['HTTP_CLIENT_IP'];
  }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $getrealip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }else{
    $getrealip = $_SERVER['REMOTE_ADDR'];
  }
  return $getrealip;
}
# Функция определения страны...
function country(){
  require $_SERVER['DOCUMENT_ROOT'].'/country/SxGeo.php';
  $SxGeo = new SxGeo($_SERVER['DOCUMENT_ROOT'].'/country/SxGeoCity.dat');
  $sx_geo = $SxGeo->getCityFull(getrealip()); 
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
# Функция отправки клиента на казино...
function startcasino($casino, $country, $redirect){
  # Онлайн казино (AzartPlay)...
  if($casino == 1){
	  $linkstart = 'http://rda1ne21.com/?az122016=';
  }else
  # Онлайн казино (Admiral)...
  if($casino == 2){
	  $linkstart = 'http://rea3ne21.com/?qs=ad122017';
  }else
  # Онлайн казино (SlotVoyager)...
  if($casino == 3){
	  $linkstart = 'http://rrk2ne21.com/?lid122018=';
  }else
  # Онлайн казино (FrankCasino)...
  if($casino == 4){
	  $linkstart = 'http://game-paradiseclub.com/offers/signup?fc=fc130222';
  }else  
  # Онлайн казино (CasinoKhan)...
  if($casino == 5){
	  $linkstart = 'http://dirkzne11.com/?kh122022=';
  }else   
   # Онлайн казино (DriftCasino)...
  if($casino == 6){
	  $linkstart = 'http://my-games-list.com/promo/free_spins_x10?dc122771=';
  }else   
   # Онлайн казино (Europa Casino)...
  if($casino == 7){
	  $linkstart = 'http://online.mik123.com/promoRedirect?key=ej0yMTk1NDI1NDA0Jmw9MjE5NTQyNTMwMSZwPTEwNDA5MTQ%3D';
  }else   
   # Онлайн казино (Vegas Red)...
  if($casino == 8){
	  $linkstart = 'http://online.123kim.info/promoRedirect?key=ej0yMTk2ODEyNTU2Jmw9NzQxMDAwMjkmcD0xMDQwOTE0';
  }else   
   # Онлайн казино (Titan Bet)...
  if($casino == 9){
	  $linkstart = 'http://online.ga-ga-ga.info/promoRedirect?key=ej0yMTk1NDI1NDA2Jmw9MjE4ODA1MzY1OSZwPTEwNDA5MTQ%3D';
  }else   
  # Онлайн казино (Фараон HTML)...
  if($casino == 10){
	  $linkstart = 'http://alright-slots.com/alt/faraonhtml/ru/registration?95ec62186eb98b8a0b2f82f2a54cef34';
  }else   
  # Онлайн казино (Cristal Palace)...
  if($casino == 11){
	  $linkstart = 'http://bestcazino.com/alt/cristal/cpreg/auth.php?95ec62186eb98b8a0b2f82f2a54cef34';
  }else   
  # Онлайн казино (PlayFortuna.com)...
  if($casino == 12){
	  $linkstart = 'http://casino-redirect.com/alt/playfortuna/registration/render?95ec62186eb98b8a0b2f82f2a54cef34';
  }else   
  # Онлайн казино (ArgoCasino.com)...
  if($casino == 13){
	  $linkstart = 'http://pugin2play.com/affiliate/argo.php?a_aid=56c8fc450fbf4 ';
  }else   
  # Онлайн казино (GrandCrystalCasino.com)...
  if($casino == 14){
	  $linkstart = 'http://pugin2play.com/affiliate/crystal.php?a_aid=56c8fc450fbf4';
  }else   
  # Онлайн казино (Multi Gaminator Club)...
  if($casino == 15){
	  $linkstart = 'https://casinoplay.me/redirect?project=MultiGaminatorClub&partner=1944&banner_id=45';
  }else   
  # Онлайн казино (LuxorSlots)...
  if($casino == 16){
	  $linkstart = 'https://casinoplay.me/redirect?project=LuxorSlots&partner=1944&banner_id=43';
  }else   
  # Онлайн казино (ZigZag777)...
  if($casino == 20){
	  $linkstart = 'http://pugin2play.com/affiliate/zigzag777.php?a_aid=56c8fc450fbf4';
  }else   
  # Онлайн казино (Volcano)...
  if($casino == 17){
	  $linkstart = 'https://casinoplay.me/redirect?project=Volcano&partner=1944&banner_id=103';
  }else   
  # Онлайн казино (CasinoSlava)...
  if($casino == 18){
	  $linkstart = 'https://casinoplay.me/redirect?project=CasinoSlava&partner=1944&banner_id=317';
  }else   
  # Онлайн казино (CasinoSlava)...
  if($casino == 19){
	  $linkstart = 'http://gambling-partners.com/ref/47725906/';
  }else{
    return header("Location: /");
  }
return header("Location: $linkstart");  
}
# $redirect (0 выключеный - 1 включоный)...
$redirect = 0;
if(isset($_GET['casino'])){
  startcasino(intval($_GET['casino']), country(), $redirect);
}
?>