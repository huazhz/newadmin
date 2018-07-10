<?
include "_inc_session.php";
$_ACTIVE['home'] = $_ACTIVE['home_settings'] = 'active';
include "_inc_top.php";
if (sizeof($_POST) > 0)
{
	foreach ($_POST as $k =>  $v)
	{
		$mysqlQuery  = "INSERT INTO `exceed_settings_vals` (`var`, `val`) VALUES ('".$k."','".formatData($v)."')";
		$mysqlQuery .= "ON DUPLICATE KEY UPDATE `val` = '".addslashes($v)."'";
		mysql_query($mysqlQuery); 
		
	}
	$saved = 1;
}
$data = getAllData('exceed_settings_vals', '1');
for ($i = 0; $i < sizeof($data); $i++)
{
	$_SETTINGS[$data[$i][0]] = stripslashes($data[$i][1]);
}




?>
<div class="content-wrapper">
        <section class="content-header">
          <h1>
            Home Page Settings
            <small>show, hide and manage the widget on home page</small>
          </h1>
        </section>
        <section class="content">
        <form method="post">
        <div class="row">
			<div class="col-md-6">
				<div class="box box-info">
	                <div class="box-header with-border">
	                  <h3 class="box-title">Show / Hide Widgets </h3>
	                </div>
	                <div class="box-body">
	                <?
	                $settingsArr['homeshow-topseller'] = "Show Top Sellers";
					$settingsArr['homeshow-banner-1'] = "Show Inner Banner -1 ";
					$settingsArr['homeshow-feaured-cats'] = "Show Featured Categories / Products";
					$settingsArr['homeshow-banner-2'] = "Show Inner Banner -2";
					$settingsArr['homeshow-feaured-listings'] = "Show Featured Lisings";
					
	                	$settingsArrValues['homeshow-feaured-cats'] = $settingsArrValues['homeshow-feaured-listings'] = array('yes'=>'Yes', 'no'=>'No'); 
 					$settingsArrValues['homeshow-topseller'] = array('0'=>'Do Not Show', '5'=>'Top 5', '10'=>'Top 10'); 
 					$settingsArrValues['homeshow-banner-1'] = array('0'=>'Do Not Show'); 
 					$banners = getAllData('exceed_pages', 'navigation=102 order by `order`');
 					for ($i = 0; $i < sizeof($banners); $i++)
 					{
 						$settingsArrValues['homeshow-banner-1'][$banners[$i][0]] = $banners[$i][1];
 					}
 					
 					$settingsArrValues['homeshow-banner-2'] = $settingsArrValues['homeshow-banner-1'];
 					
	                foreach($settingsArr as $k => $v)
	                {
	                ?>
	                	<div class="form-group" style="border-bottom:1px solid #ddd;height:40px;line-height:40px;">
		                    
									<?=$v?>			                   
			                    	<select name="<?=$k?>" class="form-control" style="width:180px;float:right;">
			                    	<?
			                    	$slctdVal[$k][$_SETTINGS[$k]] = 'selected';
			                    	foreach($settingsArrValues[$k] as $optionI => $optionV)
			                    	{
			                    	?>
			                    	<option value="<?=$optionI?>" <?=$slctdVal[$k][$optionI]?>><?=$optionV?></option>
			                    	<?
			                    	}
			                    	?>
			                    	</select>
			                    
                  		</div>
                  	<?
                  	}
                  	?>
	                </div>
	            </div>
        	</div>
        	        	
        </div>
        <div class="row">
        	<div class="col-md-12">
        	<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp; Save </button>
        	</div>
        </div>
        </form>
  		</section>
</div>
<script>
</script>      
<?
include "_inc_footer.php";
?>
<script src="plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
      $(function () {
        CKEDITOR.replace('copyright-text');
      });
</script> 

</body>
</html>