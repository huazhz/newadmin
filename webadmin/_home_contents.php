<?
include "_inc_session.php";
$_ACTIVE['home'] = $_ACTIVE['home_contents'] = 'active';
//$customHeader = '<link href="plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>';

include "_inc_top.php";

$settingsSuffix = 'welcome';


if ($_FILES['bgphoto']['tmp_name'] != '')
{
	$BGthumbPhoto= "../uploads/background-color-".$settingsSuffix.".jpg";
	$BGtargetPhoto = "../uploads/background-color-".$settingsSuffix."_orginal.jpg";
	@unlink($BGtargetPhoto);
	@unlink($BGthumbPhoto);
	move_uploaded_file($_FILES['bgphoto']['tmp_name'],$BGtargetPhoto);
	corp_img($BGtargetPhoto,$BGthumbPhoto,1600,800, $_FILES['bgphoto']['name']);
}

if ($_FILES['titleicon']['tmp_name'] != '')
{
    $BGtargetPhoto = "../uploads/home-paragraph-icon-".$settingsSuffix.".jpg";
	@unlink($BGtargetPhoto);
	move_uploaded_file($_FILES['titleicon']['tmp_name'],$BGtargetPhoto);
}



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
            Home > WYSIWYG Area 1
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
               // include "_home_inc_section_settings.php";
                ?>

			    <div class="box">
                <div class="box-body">
                  <div class="row">
                     <div class="col-xs-12 col-md-9">
                        <div class="form-group">
                             <label>Title</label>
                             <input name="home-paragraph-title-<?=$settingsSuffix?>"  class="form-control" value="<?=unFormatData($_SETTINGS['home-paragraph-title-'.$settingsSuffix])?>">
                        </div>
                        
                     </div>
                     <div class="col-xs-12 col-md-3">
                      	
                        <div class="form-group">
                        	<?
                        	$homeParaStatus[$_SETTINGS['home-paragraph-status-'.$settingsSuffix]] = 'checked';
                        	?>
                      		<label>Status&nbsp;&nbsp;&nbsp;</label> <br>
                            <input type="radio" name="home-paragraph-status-<?=$settingsSuffix?>" <?=$homeParaStatus[1];?> value="1"  />&nbsp;&nbsp;Active &nbsp;&nbsp;
                            <input type="radio" name="home-paragraph-status-<?=$settingsSuffix?>" <?=$homeParaStatus[0];?> value="0"  />&nbsp;&nbsp;Hidden<br /><br />
                        </div> 
                                               
                       </div>
                     
                     <div class="col-xs-12 ">
                         <label>Contents  </label>
                     	<textarea name="home-paragraph-contents-<?=$settingsSuffix?>" id="home-paragraph-contents-<?=$settingsSuffix?>"><?=unFormatData($_SETTINGS['home-paragraph-contents-'.$settingsSuffix])?></textarea> <br /><br />
	                     	
                         </div>
                </div>
                 

                  
                </div>
              </div> 
              <?
             // include "_home_inc_custom_css.php";
              ?>
              
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
?>
</body>
</html>    