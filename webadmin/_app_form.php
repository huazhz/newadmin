<?
include "_inc_session.php";
$_ACTIVE['app'] = $_ACTIVE['app_forms'] = 'active';

$customHeader ='<link rel="stylesheet" type="text/css" media="screen" href="../formBuilder/css/form-builder.css">';
$customHeader .='<link rel="stylesheet" type="text/css" media="screen" href="../formBuilder/css/form-render.css">';


include "_inc_top.php";

if (sizeof($_POST) > 0)
{
		
		if ($_POST['submit2'] <= 0)
		{
			$addObj['sidehtmlcontents'] = addslashes($_POST['formCSS']);
			$addObj['pageapps'] = addslashes($_POST['formJS']);
			$addObj['contents'] = formatData(str_replace(array("\r\n", "\r", "\n", "\t"), "", $_POST['formSavedData']));
		}

		$addObj['title'] = formatData($_POST['title']);
		$addObj['sidenavpages'] = formatData(str_replace(array('\r\n', '\r', '\n', '\t'), "", json_encode($_POST['formSettings'])));
	
		
	
		if ($_POST['id'] > 0)
		{
			updateRecord('exceed_pages', $addObj, 'id='.$_POST['id']);
			$pageID = $_POST['id'];
			$saved = mysql_affected_rows ();
		}
		else
		{
			$addObj['order'] = getMinOrder('exceed_pages');
			$addObj['navigation'] = 10007;
			$addObj['pageURL'] = 'testimonials'.time();
			$saved = addRecord('exceed_pages', $addObj);
			$pageID = $saved ;
		}
			echo '<script>document.location.href="_app_form.php?id='.$pageID.'&saved='.$saved.'";</script>';


		
		

}


$mypage = getDetails('exceed_pages', 'id='.$_GET['id']);
//$mypage['locked'] = 0;
if ($mypage['locked'] == 1) 
{
	$style = 'style="display:none;"';
	$style2 = 'col-md-12'; 
}
else 
{
	$style1 = 'collapsed-box';
	$style2 = 'col-md-4';
}
?>
					<!-- Modal -->
                            

      <div class="content-wrapper">
        <section class="content-header">
          <h1>
          <?
          if ($_GET['id'] > 0)
          echo 'Edit Form';
          else
          echo 'Add New Form';
          ?>
            
            <small>Use the form builder to build the required form.</small>
          </h1>
        </section>
      <section class="content">
       <form method="post">
       <input type="hidden" name="id" value="<?=$mypage[0]?>">
        <div class="row">
                <div class="col-md-8" <?=$style?>>
                <div class="box box-default box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Details </h3>
                  <div class="box-tools pull-right">
                    <?
          			if ($mypage[3] != '') 
          				echo '<il><a href="../form/'.$mypage[0].'" class="btn btn-sm btn-success" style="float:left;color:#fff;" target="_blank"><i class="fa fa-external-link"></i> Preview Form</a></li>';
          			?>
                  
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body">
                
                <div class="content">
				<div class="build-wrap"></div>
				<div class="render-wrap"></div>
				</div>
				<?
				$replacetohtml1 = array('&quot;', '&gt;', '&lt;', '\n', '&amp;', "'");
				$replacetohtml2 = array('', '>', '<', '', '&', '&#8242;');
				?>
					<input type="hidden" id="formSavedData" name="formSavedData" value='<?=unFormatData(str_replace($replacetohtml1,$replacetohtml2, $mypage["contents"]))?>'>
                
                </div>
                <div class="box-footer">
                    <button type="submit" id="submit0btn" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp; Save Form</button>
                </div>
              </div>

                
                </div>
                <div class="<?=$style2?>">
                <div class="form-group">
                                           			 <label>From Name <small>- Name For Admin Only</small> </label>
                                            			<input name="title" class="form-control" value="<?=unFormatData($mypage['title'])?>">
                                            			
                                        			</div>
                <div class="box box-default box-solid" <?=$style?>>
                <div class="box-header with-border">
                  <h3 class="box-title">Custom CSS - <small>For Designer / Developer Only</small> </h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body">
                	<?
                	$mypage['sidehtmlcontents'] = str_replace('"', "'", $mypage['sidehtmlcontents']);
                	?>
                		<textarea  class="code-container" name="formCSS"><?=unFormatData($mypage['sidehtmlcontents'])?></textarea>   
                </div>
  

                </div>
                
                <div class="box box-warning box-solid collapsed-box" <?=$style?>>
                <div class="box-header with-border">
                  <h3 class="box-title">Custom Javascript Verification </h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div>
                </div>
                <div class="box-body">
                	<?
                	$mypage['pageapps'] = str_replace('"', "'", $mypage['pageapps']);
                	?>
                		<textarea  class="code-container" name="formJS"><?=unFormatData($mypage['pageapps'])?></textarea>   
                </div>
  

                </div>
                
                
                <div class="box box-danger <?=$style1?>">
		                <div class="box-header with-border">
		                	<div class="box-tools pull-right">
		                    	<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
		                  	</div>
		                  <h3 class="box-title">Form Settings</h3>
		                </div>
	                	<div class="box-body">
	                	<?
	                	if ($mypage['sidenavpages'] != '')
	                	$frmSettingsArr = json_decode($mypage['sidenavpages'], true);
	                	?>
	                		<div class="form-group">
		                      <label>Send Notification To Emails </label>
		                      	<input type="text" class="form-control" name="formSettings[notification]"  value="<?=unFormatData($frmSettingsArr['notification'])?>">
		                    </div>
		                    <div class="checkbox">
		                      <label>
		                        <input type="checkbox" name="formSettings[notifycustomer]" value="1" <?if ($frmSettingsArr['notifycustomer'] == 1) echo 'checked';?>> Send Thank You Message To Email Field In Form
		                      </label>
		                    </div>
		                    <div class="checkbox">
		                      <label>
		                        <input type="checkbox" name="formSettings[captchs]" value="1"  <?if ($frmSettingsArr['captchs'] == 1) echo 'checked';?>> Enable I'm not robot check
		                      </label>
		                    </div>
                    
                    

		                    <div class="form-group">
		                      <label>Thank You Message</label>
		                      	<textarea id="formSettings[thankMsg]" name="formSettings[thankMsg]" rows="10" cols="80"><?=$frmSettingsArr['thankMsg']?></textarea>
		                    </div>
	                	</div>	      
	                	<?
	                	if ($mypage['locked'] == 1)
	                	{
	                	?>          
	                	 <div class="box-footer">
                    		<button type="submit" id="submit0btn" name="submit2" value="1" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp; Save Form</button>
                		</div>
                		<?
                		}
                		?>
	                	</div>
                
                

                
                
            </div>
        
        </form>
  		</section>      </div>

<?
include "_inc_footer.php";
?>
<script src="plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
      $(function () {
             
        CKEDITOR.replace('formSettings[thankMsg]', {
        	toolbar: [[ 'Source','-', 'JustifyLeft','JustifyCenter','JustifyRight', 'Bold', 'Italic','Underline','Strike','-', 'Link', 'Unlink','Image', 'Styles','Format','Font','FontSize' , '-',  'TextColor','BGColor' ]]
        });
      });
</script>
<?
if ($mypage['locked'] <= 0)
{
?>
<script src="../formBuilder/js/form-builder.js"></script>
<script src="../formBuilder/js/site.js"></script> 
<?
}
?>
</body>
</html>    