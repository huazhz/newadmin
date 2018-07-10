<footer id="footer">
  <div class="row">
    <div class="footer-header">
      <div class="small-12 medium-4 large-4 columns"> <img class="logo" src="<?=$sitePath?>/images/imadecs-logo-w.png" alt="" /> </div>
      <div class="small-12 medium-8 columns">
        <div class="quick-links"> <a class="expert-portal" href="#"><em></em> Expert Portal</a> <a class="client-portal" href="#"><em></em> Client Portal</a> </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="footer-body">
      <div class="small-12 medium-5 large-3 columns">
        <ul class="address">
          <li><i class="fa fa-map-marker" aria-hidden="true"></i>
            <address>
			
			<?=unFormatData(nl2br($_SETTINGS['footer-contacts-address']))?>

            </address>
          </li>
          <li class="phone"><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:<?=unFormatData(nl2br($_SETTINGS['footer-contacts-phone']))?>"><?=unFormatData(nl2br($_SETTINGS['footer-contacts-phone']))?></a></li>
          <li class="phone"><i class="fa fa-fax" aria-hidden="true"></i> <a href="tel:<?=unFormatData(nl2br($_SETTINGS['footer-contacts-fax']))?>"><?=unFormatData(nl2br($_SETTINGS['footer-contacts-fax']))?></a></li>
          <li class="email"><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mail:<?=unFormatData(nl2br($_SETTINGS['footer-contacts-email']))?>"><?=unFormatData(nl2br($_SETTINGS['footer-contacts-email']))?></a></li>
        </ul>
      </div>
      <div class="small-12 medium-7 large-5 columns">
        <div class="row">
          <div class="small-12 medium-11 medium-offset-1 columns">
            <div class="title-nav"><?=unFormatData($_SETTINGS['footer-sitemap-title'])?></div>
          </div>
          <div class="small-12 medium-4 medium-offset-1 columns">
            <nav> <ul><?
		            $_SETTINGS[$settingPrefix.'footer-sitemap'] = json_decode(stripslashes($_SETTINGS[$settingPrefix.'footer-sitemap']), true);
					for ($i = 0; $i < sizeof($_SETTINGS[$settingPrefix.'footer-sitemap']['url']); $i++)
					{
					if ($_SETTINGS[$settingPrefix.'footer-sitemap']['text'][$i] != '')
					{
					?>
						<li><a href="<?=addsitepath($_SETTINGS[$settingPrefix.'footer-sitemap']['url'][$i], $sitePath)?>"><?=$_SETTINGS[$settingPrefix.'footer-sitemap']['text'][$i]?></a></li>
					<?
					}
					}
		            ?></ul> </nav>
          </div>
          <div class="small-12 medium-6 columns">
            <nav> <a href="#">Initiate a Review</a> <a href="#">Reviewer Opportunities</a> <a href="#">Contact Us</a> </nav>
          </div>
        </div>
      </div>
      <div class="small-12 medium-12 large-4 columns">
        <div class="group-logo"><img src="<?=$sitePath?>images/logo-group.png" alt="" /></div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="small-12 columns">
      <div class="footer-footer">
        <p>Disclaimer: Due to varying state and health plan requirements, this website may not be used to initiate an independent medical review. To request a review, contact your health plan or your state insurance or health department. Copyright © 2013 Independent Medical Expert Consulting Services Inc. <a href="#">Terms & Conditions</a> and <a href="#">Privacy Statement</a></p>
        <?=unFormatData($_SETTINGS[$settingPrefix.'footer-copyright-right'])?>
      </div>
    </div>
  </div>
</footer>
</body>
</html>



        <?=stripslashes($_SETTINGS['add-on-javascript-footer'])?>
        </body>
</html>