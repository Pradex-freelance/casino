<?php require_once $_SERVER['DOCUMENT_ROOT']."/bootstrap.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta name="viewport" content="width=1024px">
<title><?php if(isset($title) && !empty($title)) echo $title; ?></title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <?php
    if(isset($description) && !empty($description)) echo '<meta name="description" content="'.$description.'">';
    if(isset($keywords) && !empty($keywords)) echo '<meta name="keywords" content="'.$keywords.'">';
    ?>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/css/main.css?v=1.04" type="text/css">
    <?php if(isset($css) && !empty($css)) echo $css; ?>
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/jquery.jrumble.min.js"></script>
    <script type="text/javascript" src="/js/jquery.ukobaks.js"></script>
    <?php if(isset($js) && !empty($js)) echo $js; ?>
</head>
   <body>
   <!-- Yandex.Metrika counter -->
   <script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter38250655 = new Ya.Metrika({
                    id:38250655,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
   </script>
   <noscript><div><img src="https://mc.yandex.ru/watch/38250655" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
   <!-- /Yandex.Metrika counter -->
   <?php 
   # Подключаем файл подключения БД...
   require_once $_SERVER['DOCUMENT_ROOT']."/config/db.php";
   # Подключаем файл функций проекта...
   require_once $_SERVER['DOCUMENT_ROOT']."/config/functions.php";
   ?>
    <!--
   <div id="banner-left">
       <div class="cover1">
       </div>
       <img src="http://storage.speedmydata.com/source/1/NjhxdATi8cwlGE4SzBhLzrGC2JE1OBAX.gif">
   </div>
   <div id="banner-right">
       <div class="cover2">
       </div>
       <img src="http://storage.speedmydata.com/source/1/NjhxdATi8cwlGE4SzBhLzrGC2JE1OBAX.gif">
   </div>
    -->
     <!-- Начало gs_header -->
     <div id="gs_header">
	   <!-- Начало gs_header_bl -->
       <div id="gs_header_bl">
	      <!-- Начало gs_header_container -->
          <div id="gs_header_container">
		    <!-- Начало gs_logo -->
	        <a id="gs_logo" class="gs_logo" href="/"></a>
			<!-- Конец gs_logo -->
			 <!-- Начало gs_banners_top -->
             <div id="gs_banners_top">
             <a rel="nofollow" href="/redirect?start=2" target="_blank">
               <img src="/banners/468/frank.gif" width="468" height="60">
             </a>
			 </div>
			 <!-- Конец gs_banners_top -->
		  </div>
		  <!-- Конец gs_header_container -->
        </div>
		<!-- Конец gs_header_bl -->
     </div>
	 <!-- Конец gs_header -->
	 <!-- Начало gs_wrapper -->
	 <div id="gs_wrapper">
	   <!-- Начало gs_wrapper_nav -->
	   <div id="gs_wrapper_nav">
          <!-- Начало nav -->
          <div id="nav">
           <ul>
            <li <?php echo menuact('index.php'); ?>><a href="/"><i class="icon i-new"></i><span>Главная</span></a></li>
            <li <?php echo menuact('sloty-online-besplatno.php'); ?>><a href="/sloty-online-besplatno"><i class="icon i-777"></i><span>Слоты</span></a>
                <!--
				<ul>
                    <li><a href="#"><span>Igrosoft</span></a></li>
                    <li><a href="#"><span>Kyle Bragger</span></a></li>
                    <li><a href="#"><span>Jack Rugile</span></a></li>
                </ul>
				-->
            </li>
            <li <?php echo menuact('play-v-ruletky-online.php'); ?>><a href="/play-v-ruletky-online"><i class="icon i-roulet"></i><span>Рулетка</span></a> 
                <!--
				<ul>
                    <li><a href="#"><span>Амереканская рулетка</span></a></li>
                    <li><a href="#"><span>Руская рулетка</span></a></li>
                    <li><a href="#"><span>Европейская рулетка</span></a></li>
                    <li><a href="#"><span>Plugins</span></a></li>
                    <li><a href="#"><span>Security</span></a></li>
                </ul>
				-->
            </li>
            <li <?php echo menuact('blackjack-online-besplatno.php'); ?>><a href="/blackjack-online-besplatno"><i class="icon i-cards"></i><span>Блэкджек</span></a></li> 
            <li <?php echo menuact('chestnyie-online-kazino.php'); ?>><a href="/chestnyie-online-kazino"><i class="icon i-popular"></i><span>Казино</span></a></li>
            <li <?php echo menuact('bezdepozitnue-bonusy.php'); ?>><a href="/bezdepozitnue-bonusy"><i class="icon i-recomend-small"></i><span>Бонусы</span></a></li>
            <!-- <li <?php echo menuact('news.php'); ?>><a href="/news"><i class="icon i-news"></i><span>Новости</span></a></li> -->
            </ul>
          </div>
		  <!-- Конец nav -->
       </div>
	   <!-- Конец gs_wrapper_nav -->
         <div class="flex-container">
             <div class="side-banner-left">
                 <a href="<?= \pradex\ApplicationRegistry::getInstance()->getValue('left-banner-link'); ?>">
                    <img src="<?= \pradex\ApplicationRegistry::getInstance()->getValue('left-banner-img'); ?>">
                 </a>
             </div>
   	        <!-- Начало gs_wrapper_bl -->
           <div id="gs_wrapper_bl">
             <!-- Начало gs_content -->
             <div id="gs_content" style="z-index: 5">