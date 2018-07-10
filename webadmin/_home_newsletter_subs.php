<?
include "_inc_session.php";
$_ACTIVE['home'] = $_ACTIVE['home_newsletter_subs'] = 'active';

include "_inc_top.php";

$settingsSuffix = 'newsletter';


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
            Home > Newsletter Subscribers 
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
                     <div class="col-xs-12 col-md-9">
                        <div class="form-group">
                             <label>Title</label>
                             <input name="home-paragraph-title1-<?=$settingsSuffix?>"  class="form-control" value="<?=unFormatData($_SETTINGS['home-paragraph-title1-'.$settingsSuffix])?>">
                        </div>
                        <div class="form-group">
                             <label>Description </label>
                             <input name="home-paragraph-title2-<?=$settingsSuffix?>"  class="form-control" value="<?=unFormatData($_SETTINGS['home-paragraph-title2-'.$settingsSuffix])?>">
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
                                                <div class="form-group">
                        	<?
                        	$homeParaStatus1[$_SETTINGS['home-paragraph-form-'.$settingsSuffix]] = 'selected';
                        	?>
                      		<label>Subscribe Form</label> <br>
                      		
                      				<select class="form-control"  name="home-paragraph-form-<?=$settingsSuffix?>">
                      				<option value="0">- No Form -</option>
		                    		<?
		                    		$allFrms = getAllData('exceed_pages', 'navigation=10007 order by `order` desc');
									for ($i = 0; $i < sizeof($allFrms); $i++)
									{
										echo '<option value="'.$allFrms[$i][0].'" '.$homeParaStatus1[$allFrms[$i][0]].'>'.unFormatData($allFrms[$i][1]).'</option>';
									}
		                    		?>
		                    		</select>
                      		
                      		

                        </div> 
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

</body>
</html>    