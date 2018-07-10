      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Powered by </b> <a href="http://exceedcms.com" target="_blank">exceed cms</a>
        </div>
        <strong>Copyright &copy;<?=date("Y")?> <a href="<?=$sitePath;?>">Wilmad LabGlass</a>.</strong> All rights reserved.
      </footer>
    </div>
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>    
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="js/app.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="colorbox/jquery.colorbox.js"></script>
    <script src="js/exceed-admin.js" type="text/javascript"></script>
    <?=$customFooterScripts?>
	<script>
	$(window).load(function () {
		$('#pageloader').fadeOut();
	});
	</script>
