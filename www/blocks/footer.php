         </div>
		 <!-- Конец content -->
		 <?php require_once $_SERVER['DOCUMENT_ROOT']."/blocks/sidebar.php"; ?>
	   </div>
	   <!-- Конец gs_wrapper_bl -->
             <div class="side-banner-right">
                 <a href="<?= \pradex\ApplicationRegistry::getInstance()->getValue('right-banner-link'); ?>">
                    <img src="<?= \pradex\ApplicationRegistry::getInstance()->getValue('right-banner-img'); ?>">
                 </a>
             </div>
         </div>
         <!--flex-->
	 </div>
	 <!-- Конец gs_wrapper -->
	 <div class="clear"></div>
	 <!-- Начало gs_footer -->
	 <div id="gs_footer">
	   <!-- Начало gs_footer -->
	   <div id="gs_footer_bl">
	     <a rel="nofollow" class="gs_logo_footer" href="index"></a>
		 <div class="copyrights">
		 <b>© <?php echo date('Y'); echo ' '. $_SERVER['SERVER_NAME']; ?> (18+)<b> Только бесплатные демо-версии игровых автоматов.
		 </div>
	      <div class="footermenu">
                <a href="/sitemap.html">Карта сайта</a> - 
				<a href="/sitemap.xml">XML</a>
          </div>
	   </div>
	   <!-- Конец gs_footer_bl -->
	 </div>
	 <!-- Конец gs_footer -->
	 <div id="scrollup"><img alt="Прокрутить вверх" src="/css/img/bg-scrollup.png"></div>
   </body>
</html>