<?
if ($_POST['saveSettings'] == 1)
{
	foreach ($_POST as $k =>  $v)
	{
		$mysqlQuery  = "INSERT INTO `exceed_settings_vals` (`var`, `val`) VALUES ('".$k."','".addslashes($v)."')";
		$mysqlQuery .= "ON DUPLICATE KEY UPDATE `val` = '".addslashes($v)."'";
		mysql_query ($mysqlQuery); 
		
	}
}


$dataSettings = getAllData('exceed_settings_vals', '1');
for ($i = 0; $i < sizeof($dataSettings); $i++)
{
	$_SETTINGS[$dataSettings[$i][0]] = stripslashes($dataSettings[$i][1]);
}
$_SETTINGS['footer-sitemap'] = json_decode(stripslashes($_SETTINGS['footer-sitemap']), true);

?>
				<div class="box box-default box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Navigation Main Page Settings</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body">
                <form method="post">
                    <div class="row">
	                  
												<div class="col-xs-12 col-md-4">
				                                	<div class="form-group">
                                           			 <label>Title </label>
                                            			<input name="settings-nav-title-<?=$navDetails[0]?>" value="<?=unFormatData($_SETTINGS['settings-nav-title-'.$navDetails[0]])?>" class="form-control">
                                            			
                                        			</div>
				                                </div>
				                                <div class="col-xs-12 col-md-3">
				                                	<div class="form-group">
                                           			 <label>Inner Banner </label>
                                            			<select size="1" name="settings-nav-innerbannerid-<?=$navDetails[0]?>" class="form-control">
						                                <? 
						                                $layoutBannerType[$_SETTINGS['settings-nav-innerbannerid-'.$navDetails[0]]]='selected';
						                               	$pageBannerLayoutArry =  getAllData('exceed_photos', "`section`='innerbanners' order by `order`");
						                                for ($i = 0; $i < sizeof($pageBannerLayoutArry); $i++)
						                                {
						                                ?>
						                                <option value="<?=$pageBannerLayoutArry[$i][0]?>" <?=$layoutBannerType[$pageBannerLayoutArry[$i][0]]?> ><?=$pageBannerLayoutArry[$i][1]?></option>
						                                <?
						                                }
						                                ?>
														</select>

                                            			
                                        			</div>
				                                </div>
				                                <?
				                                if ($navDetails[0] == 3)
				                                {
				                                ?>
				                                <div class="col-xs-12 col-md-3">
				                                	<div class="form-group">
                                           			 <label>Sales Agent Banner Banner </label>
                                           			 
                                           			 <select size="1" name="settings-nav-agentbanner-<?=$navDetails[0]?>" class="form-control">
						                                <option value="0">-- None --</option>
						                                <? 
						                                $layoutBannerType[$_SETTINGS['settings-nav-agentbanner-'.$navDetails[0]]]='selected';
						                               	$pageBannerLayoutArry =  getAllData('exceed_pages', 'status=1 and navigation=10006 order by `order`');
						                                for ($i = 0; $i < sizeof($pageBannerLayoutArry); $i++)
						                                {
						                                ?>
						                                <option value="<?=$pageBannerLayoutArry[$i][0]?>" <?=$layoutBannerType[$pageBannerLayoutArry[$i][0]]?> ><?=$pageBannerLayoutArry[$i]['seo_keywords']?> - <?=$pageBannerLayoutArry[$i][1]?></option>
						                                <?
						                                }
						                                ?>
														</select>
                                           			 
                                           			 

                                            			
                                        			</div>
				                                </div>
				                                
				                                
				                                <?
				                                }
				                                ?>
				                                
				                                <div class="col-xs-12 ">
                         <label>Introduction Optional Text   </label>
                     	<textarea name="settings-nav-paragraph-intor-<?=$navDetails[0]?>" id="settings-nav-paragraph-intor-<?=$navDetails[0]?>"><?=unFormatData($_SETTINGS['settings-nav-paragraph-intor-'.$navDetails[0]])?></textarea> 
	                     	
                         </div>
				                                <div class="col-xs-12 col-md-2">
				                                	<div class="form-group">
                                            			<button style="margin-top:25px;" name="saveSettings" value="1" type="submit" class="btn btn-success">Save</button>
                                            			
                                        			</div>
				                                </div>

					</div>
					</form>
                 </div>
              </div>
<?              
$customEditorsHere = '<script src="plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        CKEDITOR.replace("settings-nav-paragraph-intor-'.$navDetails[0].'");
      });
</script>      
';              
?>