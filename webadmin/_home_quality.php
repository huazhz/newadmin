<?
include "_inc_session.php";
$_ACTIVE['home'] = $_ACTIVE['home_quality'] = 'active';

include "_inc_top.php";

$settingsSuffix = 'testimonials';


if (sizeof($_POST) > 0)
{
	$_SETTINGS['css-settings-'.$settingsSuffix] = str_replace("'", '"', $_SETTINGS['css-settings-'.$settingsSuffix]);

	foreach ($_POST as $k =>  $v)
	{
		$mysqlQuery  = "INSERT INTO `exceed_settings_vals` (`var`, `val`) VALUES ('".$k."','".formatData($v)."')";
		$mysqlQuery .= "ON DUPLICATE KEY UPDATE `val` = '".addslashes($v)."'";
		mysql_query ($mysqlQuery); 
		
	}
	$saved = 1;
}
$data = getAllData('exceed_settings_vals', '1');
for ($i = 0; $i < sizeof($data); $i++)
{
	$_SETTINGS[$data[$i][0]] = stripslashes($data[$i][1]);
}

//print_r($_SETTINGS);

?>

      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Home > Commitment to Quality
          </h1>
        </section>
      <section class="content">
         <div class="row">
                <div class="col-lg-12">
                <form method="post" enctype="multipart/form-data">
                <?
                if ($saved > 0)
                {
                ?>
                	<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     Setting has been saved!
                    </div>
                <?
                }
                //include "_home_inc_section_settings.php";
                ?>

			    <div class="box">
                <div class="box-body">
                  <div class="row">
                     <div class="col-xs-12 col-md-8">
                        <div class="form-group">
                             <label>Title</label>
                             <input name="home-paragraph-title1-<?=$settingsSuffix?>"  class="form-control" value="<?=unFormatData($_SETTINGS['home-paragraph-title1-'.$settingsSuffix])?>">
                        </div>
                     </div>
                      <div class="col-xs-12 col-md-4">
                      	
                        <div class="form-group">
                        	<?
                        	$homeParaStatus[$_SETTINGS['home-paragraph-status-'.$settingsSuffix]] = 'checked';
                        	?>
                      		<label>Status&nbsp;&nbsp;&nbsp;</label> <br>
                            <input type="radio" name="home-paragraph-status-<?=$settingsSuffix?>" <?=$homeParaStatus[1];?> value="1"  />&nbsp;&nbsp;Active &nbsp;&nbsp;
                            <input type="radio" name="home-paragraph-status-<?=$settingsSuffix?>" <?=$homeParaStatus[0];?> value="0"  />&nbsp;&nbsp;Hidden<br /><br />
                        </div>  </div>
                                             
                     <div class="col-xs-12 ">
                         <label>Contents  </label>
                     	<textarea name="home-paragraph-contents-<?=$settingsSuffix?>" id="home-paragraph-contents-<?=$settingsSuffix?>"><?=unFormatData($_SETTINGS['home-paragraph-contents-'.$settingsSuffix])?></textarea> <br /><br />
	                     	
                         </div>
                         
                        <div class="col-xs-12 col-md-4">
				                                	<div class="form-group">
                                           			 <label>View All Button Text</label>
                                           			 <input name="home-paragraph-readmoretxt-<?=$settingsSuffix?>" value="<?=unFormatData($_SETTINGS['home-paragraph-readmoretxt-'.$settingsSuffix])?>" class="form-control">
                                        			</div>
				                                </div>
				                                <div class="col-xs-12 col-md-8">
				                                	<div class="form-group">
                                           			 <label>View All URL</label>
                                            			<input type="text" id="linkURL"  class="form-control page-selector" name="home-paragraph-readmoreurl-<?=$settingsSuffix?>" value="<?=unFormatData($_SETTINGS['home-paragraph-readmoreurl-'.$settingsSuffix])?>">
                                        			</div>
				                                </div>
                         
                </div>
                 

                  
                </div>
              </div> </div> 
                <div class="col-lg-12">
              <div class="box box-primary  collapsed-box">
              <div class="box-header with-border">
                  <i class="fa fa-photo"></i>
                  <h3 class="box-title">Logos</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div>
                </div>
                  <div class="box-body">
                	<iframe src="_inc_photos.php?s=home-logos&t=Logo" id="iframPreview" frameborder="0" border="0" width="100%" height="500"></iframe>
                <div class="box-footer">
                   
                </div>
              </div>
            </div>
            
          </div>
                 <div class="col-lg-12">
              <button type="submit" class="btn btn-primary">Save</button>          
  </form>
                </div>
            </div>
        
  		</section>     
</div>

<?
include "_inc_footer.php";
?>
<script>
function deleteFile2(id, filebath)
    {    	
    	if (confirm('Are you sure to delete this image?'))
    	{
    		$('#'+id).fadeOut();
    		$.get("_edit_ajax.php", {  unlinkfile: filebath});
    		
    	}	
    }
	
</script>
<script src="plugins/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        CKEDITOR.config.contentsCss = '<?=$sitePath?>editor_css.php?v=css-settings-<?=$settingsSuffix?>';
        CKEDITOR.replace('home-paragraph-contents-<?=$settingsSuffix?>');
         
      });
</script>      
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>

 <script type="text/javascript">
    $(document).ready(function () {
		 $(".my-colorpicker").colorpicker();
      });
</script>  
<?
include "_inc_crop_img.php";
include "_inc_img_viewer.php";
include "_inc_page_selector_list.php";

?>
</body>
</html>    