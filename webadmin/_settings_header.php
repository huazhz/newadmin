<?
include "_inc_session.php";
$_ACTIVE['settings'] = $_ACTIVE['settings_header'] = 'active';
include "_inc_top.php";
include "../shared_code/fontAwsomeIcons.php";

if ($_FILES['small-logo-file']['tmp_name'] != '')
{
	$targetPhoto = "../uploads/small-logo-file.png";
	@unlink($targetPhoto);
	move_uploaded_file($_FILES['small-logo-file']['tmp_name'],$targetPhoto);
}


if (sizeof($_POST) > 0)
{

	$_POST['headerbar-link'] = json_encode($_POST['headerbar-link']);
	$_POST['header-link'] = json_encode($_POST['header-link']);
	$_POST['social-link'] = json_encode($_POST['social-link']);
	foreach ($_POST as $k =>  $v)
	{
		$mysqlQuery  = "INSERT INTO `exceed_settings_vals` (`var`, `val`) VALUES ('".$k."','".addslashes($v)."')";
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

$_SETTINGS['headerbar-link'] = json_decode(stripslashes($_SETTINGS['headerbar-link']), true);
$_SETTINGS['header-link'] = json_decode(stripslashes($_SETTINGS['header-link']), true);
$_SETTINGS['social-link'] = json_decode(stripslashes($_SETTINGS['social-link']), true);

 $checkedSettings[1] = 'checked';

foreach( $_SETTINGS['social-link']['icon'] as $k => $v)
{
	if ($v != '')
	{
	$_SETTINGS['social-link']['icon'][$k] = '&#x'.ltrim($v, 'u').';';
	$_SETTINGS['social-link']['fa-icon'][$k] = getIconByCode(ltrim($v, 'u'));
	
	}
}
?>
<div class="content-wrapper">
        <section class="content-header">
          <h1>
            Header Settings
            <small></small>
          </h1>
        </section>
        <section class="content">
        <form method="post" enctype="multipart/form-data">
        <div class="row">
			<div class="col-md-6">
				<div class="box box-info">
	                <div class="box-header with-border">
	                  <h3 class="box-title">Top Header Bar </h3>
	                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
	                </div>
	                <div class="box-body">
	            		<table class="table table-bordered table-add-on-focus">
	                 <thead>
	                 <tr>
                      <th colspan="3"> <button type="button" id="headerbar-tr-11" class="pull-right btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Top Bar Links</button></th>
                    </tr>
                    <tr>
                      <th width="60%">Label</th>
                      <th>Optional URL</th>
                    </tr>
                    </thead>
                    <tbody>
	                <?
	                for ($i = 0; $i <= 10; $i++)
	                {
	                ?>
	                <tr class="table-add-on-row-<?=$i?>" id="headerbar-tr-<?=$i?>">
                      <td><input type="text" name="headerbar-link[text][<?=$i?>]"  value="<?=$_SETTINGS['headerbar-link']['text'][$i]?>" class="form-control" placeholder="Link Display Text"></td>
                      <td><input id="headerbar-url-<?=$i?>" type="text" name="headerbar-link[url][<?=$i?>]"  value="<?=$_SETTINGS['headerbar-link']['url'][$i]?>" class="form-control" placeholder="URL (Optional)"></td>
                    </tr>
	                <?
	                }
	                ?>
	                </tbody>
	               
	                </table>

	            	</div>
	            </div>
	           
        	</div>
        	<div class="col-md-6">
				<div class="box box-success">
	                <div class="box-header with-border">
	                  <h3 class="box-title">Social Links<br><small>Manage Links & Social Links</small> </h3>
	                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
	                </div>
	                
	                <div class="box-body">
	                 <table class="table table-bordered">
	                 	<tr><th  width="120">Small Logo</th>
	                 	<td><input type="file" name="small-logo-file" class="form-control">
	                 	<?
	                 	$smallLogo = '../uploads/small-logo-file.png';
	                 	if (file_exists($smallLogo))
	                 	{
	                 	?>
	                 	<div id="filesmall-logo-div">
	                 	<img src="<?=$smallLogo?>" style="max-width:200px;margin:10px 0px;border:2px solid #ddd;">
	                 	<br>
	                 	<a href="javascript:;" onclick="deleteFile('small-logo-div', '', '<?=$smallLogo?>');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
	                 	</div>
	                 	<?
	                 	}
	                 	?>
	                 	
	                 	</td>
	                 	</tr>
	                 	<tr><th>Small Logo URL</th>
	                 	<td><input type="text" name="small-logo-url"  value="<?=$_SETTINGS['small-logo-url']?>" class="form-control" placeholder="http://"><br>
	                 	
	                 	<?
	                 	$slctdSLTarget[$_SETTINGS['small-logo-urltarget']] = 'selected';
	                 	?>
	                 	<select class="form-control" name="small-logo-urltarget" style="margin-bottom:10px;">
									                        <option value="_self" <?=$slctdSLTarget['_self']?>>Same Window</option>
									                        <option value="_blank" <?=$slctdSLTarget['_blank']?>>New Window</option>
									                      </select>
									                              	<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp; Save </button>

	                 	</td>
	                 	</tr>
	                 </table>
	                 <table class="table table-bordered table-add-on-focus">
	                 <thead>
	                 	<tr><th colspan="3"><button type="button" id="social-tr-11" class="pull-right btn btn-sm btn-success"><i class="fa fa-plus"></i> Add New Social Link</button></th></tr>

                    <tr>
                      <th style="width: 40px">Icon</th>
                      <th>Page URL</th>
                    </tr>
                    </thead>
                    <tbody>
	                <?
	                for ($i = 0; $i <= 10; $i++)
	                {
	                ?>
	                <tr class="table-add-on-row-<?=$i?>" id="social-tr-<?=$i?>">
                      <td class="social-icons"><input id="social-icon-<?=$i?>" name="social-link[icon][<?=$i?>]" class=" form-control social-icons-selector fa-<?=$_SETTINGS['social-link']['fa-icon'][$i]?>" value="<?=$_SETTINGS['social-link']['icon'][$i]?>"></td>
                      <td>	<input id="social-url-<?=$i?>" type="text" name="social-link[url][<?=$i?>]"  value="<?=$_SETTINGS['social-link']['url'][$i]?>" class="form-control" placeholder="https://"></td>
                    </tr>
	                <?
	                }
	                ?>
	                </tbody>
	                </table>
                    </div>
	                
	            </div>
	           
        	</div>
        	</div>
        	<div class="row">
        	<div class="col-md-6">
				<div class="box box-info">
	                <div class="box-header with-border">
	                  <h3 class="box-title">Header Side Text </h3>
	                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
	                </div>
	                <div class="box-body">
	            		<div class="form-group">
                      			<input class="form-control" name="header-desc" value="<?=unFormatData($_SETTINGS['header-desc'])?>">
                  		</div>
	            	</div>
	            </div>
	           
        	</div>
        	<div class="col-md-6">
				<div class="box box-success">
	                <div class="box-header with-border">
	                  <h3 class="box-title">Button Links<br><small>Manage Button Links</small> </h3>
	                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
	                </div>
	                <div class="box-body">

                    <table class="table table-bordered table-add-on-focus">
	                 <thead>
	                 <tr>
                      <th colspan="3"> <button type="button" id="header-tr-11" class="pull-right btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Custom Links</button></th>
                    </tr>
                    <tr>
                      <th width="60%">Display Text</th>
                      <th>Page URL</th>
                    </tr>
                    </thead>
                    <tbody>
	                <?
	                for ($i = 0; $i <= 10; $i++)
	                {
	                ?>
	                <tr class="table-add-on-row-<?=$i?>" id="header-tr-<?=$i?>">
                      <td><input type="text" name="header-link[text][<?=$i?>]"  value="<?=$_SETTINGS['header-link']['text'][$i]?>" class="form-control" placeholder="Link Display Text"></td>
                      <td><input id="header-url-<?=$i?>" type="text" name="header-link[url][<?=$i?>]"  value="<?=$_SETTINGS['header-link']['url'][$i]?>" class="form-control page-selector" placeholder="Page URL"></td>
                    </tr>
	                <?
	                }
	                ?>
	                </tbody>
	               
	                </table>
	                <br>
	            	</div>
	                
	                
	            </div>
        	
        </div>
        </div>
        <div class="row">
        	<div class="col-md-6">
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
include "_inc_font_awsome_icons_list.php";
include "_inc_font_awsome_icons_socials.php";
include "_inc_page_selector_list.php";
?>
<script src="plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
      $(function () {
      CKEDITOR.replace('header-top-bar-desc', {height: 100,
        	toolbar: [[ 'Source','-', 'Bold', 'Italic','Underline','JustifyLeft','JustifyCenter','JustifyRight', 'Link', 'Unlink','Image']]
        });
});
</script>
</body></html>